<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NormApp\Products\Services\ProductService;

class ProductController extends Controller
{
    public function index(
        ProductService $productService
    )
    {
        $products = $productService->get();
        return view("index", compact('products'));
    }
}
