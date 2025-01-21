<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketDestroyRequest;
use App\Http\Requests\BasketStoreRequest;
use App\Http\Requests\BasketUpdateRequest;
use Illuminate\Http\Request;
use NormApp\Checkout\Interfaces\BasketServiceInterface;

class BasketController extends Controller
{
    public function index(
        Request $request,
        BasketServiceInterface $basketService
    )
    {
        $baskets = $basketService->getByUserId($request->user()->id);
        $total = $baskets->sum(function ($basket) { return ($basket->product->price ?? 0) * $basket->qty; }) ?? 0;
        return view('checkout.basket', compact('baskets', 'total'));
    }

    public function store(
        BasketStoreRequest $request,
        BasketServiceInterface $basketService
    )
    {
        try {
            $basketService->store([
                'user_id' => $request->input('user_id'),
                'product_id' => $request->input('product_id'),
                'qty' => $request->input('qty')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Ürün sepete başarıyla eklendi!',
                'count' => auth()->user()->load(['basket'])->basket->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ürün sepete eklenemedi!'
            ]);
        }
    }

    public function update(
        BasketUpdateRequest $request,
        BasketServiceInterface $basketService
    )
    {
        try {
            $basketService->updateQtyById($request->input('basket'), $request->input('qty'));

            return response()->json([
                'status' => 'success',
                'message' => 'Sepet başarıyla güncellendi!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sepet güncellenirken bir hata oluştu!'
            ]);
        }
    }

    public function destroy(
        BasketDestroyRequest $request,
        BasketServiceInterface $basketService
    )
    {
        $basketService->deleteById($request->input('basket'));
        return redirect()->back();
    }

    public function destroyAll(
        Request $request,
        BasketServiceInterface $basketService
    )
    {
        $basketService->deleteAllByUserId($request->user()->id);
        return redirect()->back();
    }
}
