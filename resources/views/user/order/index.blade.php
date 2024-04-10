@extends('user.index')
@section('title', 'Order')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
@endsection

@section('content')
    <div class="box-order">
        <a type="button" onclick="history.go(-1);return false;" class="go-back"> <img
                src="{{ asset('assets/images/chevron-left.png') }}" class="icon-back-left">
            Order/Payment</a>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="box-content-order">
                <div class="box-left-order">
                    <p class="title-order">1. Contact information</p>
                    <input type="text" class="input-info-order" name="email" placeholder="Enter your email address"
                        value="{{ old('email', $defaultAddress->email) }}">
                    <p class="title-order">2. Billing address</p>
                    <div class="box-item-order-input">
                        <input type="text" name="first_name" class="input-info-order-item" placeholder="First name"
                            value="{{ old('first_name', $defaultAddress->first_name) }}">
                        <input type="text" name="last_name" class="input-info-order-item" placeholder="Last name"
                            value="{{ old('last_name', $defaultAddress->last_name) }}">
                    </div>
                    <input type="text" class="input-info-order" name="address"
                        value="{{ old('address', $defaultAddress->address) }}" placeholder="Address">
                    <input type="text" class="input-info-order" name="region"
                        value="{{ old('region', $defaultAddress->region) }}" placeholder="Country/region">
                    <div class="box-item-order-input">
                        <input type="text" class="input-info-order-item" name="city"
                            value="{{ old('city', $defaultAddress->city) }}" placeholder="City">
                        <input type="text" class="input-info-order-item" name="country"
                            value="{{ old('country', $defaultAddress->country) }}" placeholder="Country(optional)">
                    </div>
                    <div class="box-item-order-input">
                        <input type="text" class="input-info-order-item" name="postcode"
                            value="{{ old('postcode', $defaultAddress->postcode) }}" placeholder="Postcode">
                        <input type="text" class="input-info-order-item" name="phone"
                            value="{{ old('phone', $defaultAddress->phone) }}" placeholder="Phone(optional)">
                    </div>
                    <p class="title-order">3. Payment options</p>
                    <div class="radio-item">
                        <label for="cash-on-delivery">
                            <input type="radio" id="cash-on-delivery" name="payment_method" class="custom-radio" value="cod"
                                checked>
                            <img src="{{ asset('assets/images/cash.png') }}" class="icon-pay">
                            <span>Cash on delivery</span>
                        </label>
                    </div>
                    <div class="radio-item">
                        <label for="paypal">
                            <input type="radio" id="paypal" name="payment_method" class="custom-radio" value="paypal">
                            <img src="{{ asset('assets/images/paypal.png') }}" class="icon-pay">
                            <span>Paypal</span>
                        </label>
                    </div>
                </div>
                <div class="box-right-order">
                    @foreach ($cartDetails as $cart)
                        <div class="item-product-cart">
                            <img src="{{ $cart['thumbnail'] }}" class="img-sp-buy">
                            <div class="w-100">
                                <p class="title-sp-buy">{{ $cart['name'] }}</p>
                                <p class="title-sp-buy">[Option: 14K yellow gold/15cm]</p>
                                <p class="title-sp-buy">Quantity: {{ $cart['quantity'] }}</p>
                                {{-- <p class="title-sp-buy">Discount amount: -KRW 350,000</p> --}}
                                <div class="d-flex align-items-center">
                                    @if ($cart['discount'] && \Carbon\Carbon::parse($cart['discount_end'])->isAfter(\Carbon\Carbon::now()))
                                        <span
                                            class="price-sale-buy">{{ number_format($cart['salePrice'] * $cart['quantity'], 0, '.', ',') }}
                                            đ</span>
                                        <span
                                            class="price-buy ms-3">{{ number_format($cart['price'] * $cart['quantity'], 0, '.', ',') }}
                                            đ</span>
                                    @else
                                        <span
                                            class="price-sale-buy">{{ number_format($cart['salePrice'] * $cart['quantity'], 0, '.', ',') }}
                                            đ</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <img src="{{ asset('assets/images/x.png') }}" class="delete-cart"> --}}
                        </div>
                    @endforeach
                    <div class="line-subtotal">
                        <p class="title-subtotal">Subtotal</p>
                        <input type="hidden" name="subtotal" value="{{ $subTotal }}">
                        <p class="title-subtotal">{{ number_format($subTotal, 0, '.', ',') }} đ </p>
                    </div>
                    <div class="line-subtotal">
                        <p class="title-subtotal">(-)Discount</p>
                        <input type="hidden" name="discount" value="{{ $subDiscount }}">
                        <p class="title-subtotal">{{ number_format($subDiscount, 0, '.', ',') }} đ </p>
                    </div>
                    <div class="line-total">
                        <p class="title-total">Total</p>
                        <input type="hidden" name="total" value="{{ $total }}">
                        <p class="title-total">{{ number_format($total, 0, '.', ',') }} đ </p>
                    </div>
                    <button type="submit" class="btn-buy">Confirm checkout</button>
                </div>
            </div>
        </form>
    </div>

@section('script_page')

@endsection
