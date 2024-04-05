@extends('user.index')
@section('title','Order')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/order.css')}}">
@stop

@section('content')
<div class="box-order">
   <a href="" class="go-back"> <img src="{{asset('assets/images/chevron-left.png')}}" class="icon-back-left"> Order/Payment</a>
   <div class="box-content-order">
      <div class="box-left-order">
         <p class="title-order">1. Contact information</p>
         <input type="text" class="input-info-order" placeholder="Email address">
         <p class="title-order">2. Billing address</p>
         <div class="box-item-order-input">
            <input type="text" class="input-info-order-item" placeholder="First name">
            <input type="text" class="input-info-order-item" placeholder="Last name">
         </div>
         <input type="text" class="input-info-order" placeholder="Address">
         <input type="text" class="input-info-order" placeholder="Country/region">
         <div class="box-item-order-input">
            <input type="text" class="input-info-order-item" placeholder="City">
            <input type="text" class="input-info-order-item" placeholder="Country(optional)">
         </div>
         <div class="box-item-order-input">
            <input type="text" class="input-info-order-item" placeholder="Postcode">
            <input type="text" class="input-info-order-item" placeholder="Phone(optional)">
         </div>
         <p class="title-order">3. Payment options</p>
         <div class="radio-item">
            <label for="cash-on-delivery">
               <input type="radio" id="cash-on-delivery" name="name-pay" class="custom-radio" value="">
               <img src="{{asset('assets/images/cash.png')}}" class="icon-pay">
               <span>Cash on delivery</span>
            </label>
         </div>
         <div class="radio-item">
            <label for="paypal">
               <input type="radio" id="paypal" name="name-pay" class="custom-radio" value="">
               <img src="{{asset('assets/images/paypal.png')}}" class="icon-pay">
               <span>Paypal</span>
            </label>
         </div>
      </div>
      <div class="box-right-order">
         <div class="item-product-cart">
            <img src="{{asset('assets/images/imagec2.png')}}" class="img-sp-buy">
            <div class="w-100">
               <p class="title-sp-buy">Donna Andy Classic Black Diamond Tennis Bracelet [3mm]</p>
               <p class="title-sp-buy">[Option: 14K yellow gold/15cm]</p>
               <p class="title-sp-buy">Quantity: 1</p>
               <p class="title-sp-buy">Discount amount: -KRW 350,000</p>
               <div class="d-flex align-items-center">
                  <span class="price-sale-buy">3,150,000 won</span>
                  <span class="price-buy">3,500,000 won</span>
               </div>
            </div>
            <img src="{{asset('assets/images/x.png')}}" class="delete-cart">
         </div>
         <div class="line-subtotal">
            <p class="title-subtotal">Subtotal</p>
            <p class="title-subtotal">2,900,000 won</p>
         </div>
         <div class="line-total">
            <p class="title-total">Subtotal</p>
            <p class="title-total">2,900,000 won</p>
         </div>
         <button class="btn-buy">Proceed to paypal</button>
      </div>
   </div>
</div>

@section('script_page')

@stop