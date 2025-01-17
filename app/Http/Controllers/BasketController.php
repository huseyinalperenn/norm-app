<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketStoreRequest;
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

            return redirect()->route('basket.index')->with([
                'status' => 'success',
                'message' => 'Ürün sepete başarıyla eklendi!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Ürün sepete eklenemedi!'
            ]);
        }
    }

    public function update(
        Request $request,
        BasketServiceInterface $basketService
    )
    {
        $basketService->updateQtyById($request->route('basket'), $request->input('qty'));
        return redirect()->back();
    }

    public function destroy(
        Request $request,
        BasketServiceInterface $basketService
    )
    {
        $basketService->deleteById($request->route('basket'));
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
