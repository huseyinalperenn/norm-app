@extends('layouts.core')

@section('main')
    <div class="container mt-5 text-center">
        <div class="alert alert-success" role="alert">
            <h1 class="display-4">Teşekkürler!</h1>
            <p class="lead">Siparişiniz başarıyla oluşturuldu.</p>
            <p>Sipariş Numaranız #{{ $checkout->order_number }}</p>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-3">Alışverişe Devam Et</a>
        </div>
    </div>
@endsection
