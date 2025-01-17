<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutIndexRequest;
use App\Http\Requests\CheckoutShowRequest;
use App\Interfaces\UserAddressServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use NormApp\Checkout\Interfaces\BasketServiceInterface;
use NormApp\Checkout\Interfaces\CheckoutServiceInterface;
use NormApp\Shipping\Interfaces\ShippingServiceInterface;

class CheckoutController extends Controller
{
    public function index(
        Request $request,
        UserAddressServiceInterface $userAddressService,
        BasketServiceInterface $basketService,
        ShippingServiceInterface $shippingService
    )
    {
        $baskets = $basketService->getByUserId($request->user()->id);
        if(!$baskets->count() > 0) {
            return redirect()->route('home');
        }
        $shippingList = $shippingService->all();
        $userAddresses = $userAddressService->getByUserId($request->user()->id);
        $subTotal = $baskets->sum(function ($basket) { return ($basket->product->price ?? 0) * $basket->qty; });
        $tax = $subTotal / 100 * 20;
        $total = $subTotal + $tax;
        return view('checkout.index', compact('shippingList', 'userAddresses', 'subTotal', 'tax', 'total'));
    }

    public function store(
        Request $request,
        CheckoutServiceInterface $checkoutService,
        BasketServiceInterface $basketService
    )
    {
        try {
            $checkout = $checkoutService->store([
                'user_id' => $request->user()->id,
                'order_number' => strtoupper(Str::random(8))
            ]);
            $basketService->deleteAllByUserId($request->user()->id);
            return redirect()->route('checkout.show', ['checkout' => $checkout->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Sipariş oluşturulurken bir hata oluştu.'
            ]);
        }
    }

    public function show(
        CheckoutShowRequest $request,
        CheckoutServiceInterface $checkoutService
    )
    {
        $checkout = $checkoutService->getById($request->input('checkout'));
        return view('checkout.show', compact('checkout'));
    }
}
