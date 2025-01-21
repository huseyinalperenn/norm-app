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
                    <div class="card" data-product-id="{{ $product->id }}">
                        <img src="https://placehold.co/300x300/lightblue/white?text={{ Str::limit($product->name, 32) }}" class="card-img-top img-fluid" alt="Ürün Resmi">
                        <div class="card-body d-flex justify-content-between">
                            <h5 class="card-title">{{ Str::limit($product->name, 32) }}</h5>
                            <h5 class="text-muted">₺{{ $product->price }}</h5>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <input type="hidden" name="qty" value="1"/>
                            <button class="btn btn-primary w-100" data-action="add-to-basket">Sepete Ekle</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('[data-action="add-to-basket"]').on('click', function () {
            const productId = $(this).closest('.card').attr('data-product-id');
            const qty = $(this).closest('.card').find('input[name="qty"]').val();
            $.ajax({
                url: "{{ route('basket.store') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    qty: qty
                },
                success: function (response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Başarılı',
                            text: response.message,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Sepete Git',
                            cancelButtonText: 'Alışverişe Devam Et'
                        }).then(function (result) {
                            $('#basket-count').text(response.count);
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('basket.index') }}";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Hata',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'Tamam'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: 'Hata',
                        text: xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonText: 'Tamam'
                    });
                }
            })
        });
    </script>
@endpush
