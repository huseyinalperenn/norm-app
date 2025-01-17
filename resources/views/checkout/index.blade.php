@extends('layouts.core')

@section('main')
    <div class="container py-5 h-100">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ol class="activity-checkout mb-0 px-4 mt-3">
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-receipt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Teslimat Adresi</h5>
                                        <div class="mb-3">
                                            <div class="row pb-4">
                                                @foreach($userAddresses as $address)
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div data-bs-toggle="collapse">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address1" value="{{ $address->id  }}" class="card-radio-input" checked="">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">{{ $address->type }}</span>
                                                                    <span class="fs-14 mb-2 d-block">{{ $address->name }}</span>
                                                                    <span class="text-muted fw-normal text-wrap mb-1 d-block">{{ $address->address }}</span>
                                                                    <span class="text-muted fw-normal d-block">{{ $address->phone }}</span>
                                                                    <span class="text-muted fw-normal d-block">{{ $address->city }} / {{ $address->district }}, {{ $address->zip }}</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <form class="form-control border-0" method="POST" action="{{ route('user.address.add') }}">
                                                @csrf
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="billing-type-address">Adres Türü</label>
                                                                <input type="text" class="form-control" name="type" id="billing-type-address" placeholder="Örn. Ev, İş">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="billing-name">İsim & Soyisim</label>
                                                                <input type="text" class="form-control" name="name" id="billing-name" placeholder="Örn. Ahmet Demir">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="billing-phone">Telefon</label>
                                                                <input type="text" class="form-control" name="phone" id="billing-phone" placeholder="Örn. 5511551551">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-address">Adres</label>
                                                        <textarea class="form-control" id="billing-address" name="address" rows="3" placeholder="Örn. Postane Mah. Tahaffuzhane Cd. No:548/1"></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label" for="billing-city">İl</label>
                                                                <input type="text" class="form-control" name="city" id="billing-city" placeholder="Örn. İstanbul">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label" for="billing-district">İlçe</label>
                                                                <input type="text" class="form-control" name="district" id="billing-district" placeholder="Örn. Kadıköy">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-0">
                                                                <label class="form-label" for="zip-code">Posta Kodu</label>
                                                                <input type="text" class="form-control" name="zip" id="zip-code" placeholder="Örn. 34000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-3">
                                                        <button type="submit" class="btn btn-primary btn-lg">Yeni Adres Ekle</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-truck text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Teslimat Türü</h5>
                                        <div class="mb-3">
                                            <div class="row">
                                                @foreach($shippingList as $shipping)
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <label class="card-radio-label">
                                                                <input type="radio" name="shipment" id="pay-methodoption{{$shipping->id}}" data-id="{{ $shipping->id }}" class="card-radio-input shipping" @if($shipping->id === $shippingList->first()->id) checked @endif>
                                                                <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="fa-solid fa-truck-fast d-block fs-3 mb-3"></i>
                                                                <span>{{ $shipping->name }}</span>
                                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Ödeme Yöntemi</h5>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <i class="bx bx-money d-block h2 mb-3"></i>
                                                            <span>Kapıda Ödeme</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <a href="{{ route('basket.index') }}" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Sepete Dön </a>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <div class="col-xl-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Ara Toplam :</h5>
                                    </td>
                                    <td>₺{{ $subTotal }} </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Teslimat Ücreti :</h5>
                                    </td>
                                    <td id="shipping-price">₺{{ $shippingList->first()->amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">KDV (%20) :</h5>
                                    </td>
                                    <td>₺{{ $tax  }}</td>
                                </tr>
                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Toplam:</h5>
                                    </td>
                                    <td>₺{{ $total }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <form method="POST" action="{{ route('checkout.store') }}">
                                @csrf
                                <button type="submit" class="btn btn-success my-3 w-100 btn-lg"><i class="mdi mdi-cart-outline me-2"></i>Sipariş Ver</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection

@push('scripts')
    <script>
        const shippingList = @json($shippingList);

        $(document).ready(function () {
            const shippingPriceElem = $('#shipping-price');
            $(document).on('change', '.shipping', function () {
                const selectedId = $(this).data('id');
                const selectedItem = shippingList.find(item => item.id == selectedId);
                if (selectedItem) {
                    shippingPriceElem.text('₺'+selectedItem.amount);
                } else {
                    shippingPriceElem.text('₺0');
                }
            });
        });
    </script>
@endpush

