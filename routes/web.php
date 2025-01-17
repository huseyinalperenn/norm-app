<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'store'])->middleware('guest')->name('auth.store');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('basket', BasketController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);
    Route::post('basket/destroy-all', [BasketController::class, 'destroyAll'])->name('basket.destroyAll');

    Route::post('user/address/add', [UserAddressController::class, 'store'])->name('user.address.add');

    Route::resource('checkout', CheckoutController::class)->only([
        'index',
        'store',
        'show'
    ]);
});
