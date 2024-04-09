@extends('user.index')
@section('title','Detail Styling')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/styling.css')}}">
@stop

@section('content')
<div class="swiper mySwiperBannerStyling">
   <div class="swiper-wrapper" style="height: unset">
      @foreach ($styling_img as $val_img)
      <div class="swiper-slide h-auto">
         <img src="{{asset($val_img->src)}}" class="w-100 h-100" style="object-fit: cover">
      </div>
      @endforeach
   </div>
   <div class="swiper-scrollbar"></div>
 </div>
<div class="box-detail-styling">
   <p class="title-detail-styling">{{$styling->title}}</p>
   <div class="content-detail-styling">
      {{$styling->content}}
   </div>
   <p class="title-shop-now">Shop now</p>
   <input type="text" name="styling_id" value="{{$styling->id}}" hidden>
   <div class="box-shop-product" id="product-container">
      @foreach ($styling_product as $product_item)
      <div class="item-product-shop">
         <img src="{{asset($product_item->info->thumbnail_img)}}" class="w-100">
         <div class="box-content-img">
            <p class="title-contnet-img">{{$product_item->info->name}}</p>
            @php
                $discountEndTime = \Carbon\Carbon::parse($product_item->info->discount_end);
                $currentDateTime = \Carbon\Carbon::now();
                $remainingTime = $discountEndTime->diff($currentDateTime)
                ->format('%a days %H:%I:%S');
            @endphp
            @if ($product_item->info->discount > 0 && $discountEndTime->isAfter($currentDateTime))
            @php
            if ($product_item->info->discount_type == 'percent') {
                                      $salePrice = $product_item->info->price - ($product_item->info->price * $product_item->info->discount) / 100;
                                  } else {
                                      $salePrice = $product_item->info->price - $product_item->info->discount;
                                  }
      @endphp
         <p class="title-contnet-img">{{number_format($salePrice)}} VND</p>
       @else
            <p class="title-contnet-img">{{number_format($product_item->info->price)}} VND</p>
             @endif
         </div>
      </div>
      @endforeach
   </div>
   @if(count($styling_product) == 21)
      <div class="d-flex justify-content-center mt-5">
         <a class="btn-list-shop" id="load-more-btn" data-offset="21">List</a>
      </div>
   @endif
   </div>

@section('script_page')
<script src="{{asset('assets/js/styling.js')}}"></script>
@stop