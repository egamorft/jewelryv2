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
   <div class="box-shop-product">
      @foreach ($styling_product as $product_item)
      <div class="item-product-shop">
         <img src="{{asset($product_item->info->thumbnail_img)}}" class="w-100">
         <div class="box-content-img">
            <p class="title-contnet-img">{{$product_item->info->name}}</p>
            <p class="title-contnet-img">@if ($product_item->info->current_stock != 0)
               {{$product_item->info->current_stock}}
               @else
               {{$product_item->info->price}}
            @endif VND</p>
         </div>
      </div>
      @endforeach
   </div>
   <div class="d-flex justify-content-center mt-5">
      <a href="" class="btn-list-shop">Danh sách</a>
   </div>
   </div>

@section('script_page')
<script>
   var swiper_banner = new Swiper(".mySwiperBannerStyling", {
    slidesPerView: 3,
    spaceBetween: 5,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
        300: {
            slidesPerView: 1,
        },
    },
});
</script>
@stop