@extends('layouts.core')

@section('main')
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0">Sepetim</h1>
                                            <h6 class="mb-0 text-muted">Sepette {{ !empty($baskets) ? $baskets->count() : 0 }} Ürün Mevcut</h6>
                                        </div>
                                        <hr class="my-4">
                                        @foreach($baskets as $basket)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="https://placehold.co/50x50/lightblue/white?text=test" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Ürün</h6>
                                                    <h6 class="mb-0">{{ $basket->product->name }}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <form method="POST" action="{{ route('basket.update', ['basket' => $basket->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="qty" value="{{ $basket->qty-1 }}"/>
                                                        <button type="submit" class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </form>
                                                    <input id="form1" min="1" value="{{ $basket->qty }}" type="number" class="form-control form-control-sm" />
                                                    <form method="POST" action="{{ route('basket.update', ['basket' => $basket->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="qty" value="{{ $basket->qty+1 }}"/>
                                                        <button type="submit" class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">₺{{ $basket->product->price * $basket->qty }}</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <form method="POST" action="{{ route('basket.destroy', ['basket' => $basket->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0 shadow-0">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                        <div class="pt-5 d-flex justify-content-between">
                                            <h6 class="mb-0">
                                                <a href="{{ route('home') }}" class="btn">
                                                    <i class="fas fa-long-arrow-alt-left me-2"></i>Alışverişe Dön</a>
                                            </h6>
                                            <h6 class="mb-0">
                                                <form method="POST" action="{{ route('basket.destroyAll') }}">
                                                    @csrf
                                                    <button type="submit" class="btn">
                                                        <i class="fas fa-trash me-2"></i>Sepeti boşalt
                                                    </button>
                                                </form>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Özet</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">{{ !empty($basket) ? $basket->count() : 0 }} Ürün</h5>
                                            <h5>₺{{ $total }}</h5>
                                        </div>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Toplam</h5>
                                            <h5>₺{{ $total }}</h5>
                                        </div>
                                        <a href="{{ route('checkout.index') }}" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Sepeti Tamamla</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
