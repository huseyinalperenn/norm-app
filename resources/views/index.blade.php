@php use Illuminate\Support\Str; @endphp
@extends('layouts.core')

@section('main')
    <!-- Product List -->
    <div class="container mt-5">
        <h1 class="mb-4">Ürün Listesi</h1>
        <div class="row">
            @foreach($products as $product)
                <!-- Item -->
                <div class="col col-sm-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="https://placehold.co/300x300/lightblue/white?text={{ Str::limit($product->name, 32) }}" class="card-img-top img-fluid" alt="Ürün Resmi">
                        <div class="card-body d-flex justify-content-between">
                            <h5 class="card-title">{{ Str::limit($product->name, 32) }}</h5>
                            <h5 class="text-muted">₺{{ $product->price }}</h5>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100">Sepete Ekle</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
