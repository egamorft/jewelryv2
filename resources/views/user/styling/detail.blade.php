@extends('user.index')
@section('title','Detail Styling')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/styling.css')}}">
@stop

@section('content')
<div class="swiper mySwiperBannerStyling">
   <div class="swiper-wrapper" style="height: unset">
      @for ($i=0; $i<10;$i++)
      <div class="swiper-slide">
         <img src="{{asset('assets/images/image.png')}}" class="w-100">
      </div>
      @endfor
   </div>
   <div class="swiper-scrollbar"></div>
 </div>
<div class="box-detail-styling">
   <p class="title-detail-styling">Dona & D. styling</p>
   <div class="content-detail-styling">
      <span class="contnet-big-tag" >DONA Solitaire Diamond Ring Meet Dona&D’s </span> solitaire ring that will make your dream of a diamond ring come true! You can only experience 1-carat, 5-piece solitaire using top-quality lab-grown diamonds and basic designs with Donna&D's perfect setting and balance and special details . Style it with Donna&D's Stackable Ring and own a ring that's hipper and cooler than anyone else, rather than a diamond ring that's just in a jewelry box! <strong>Labgrown Diamond | Moissanite</strong>
   </div>
   <p class="title-shop-now">Shop now</p>
   <div class="box-shop-product">
      @for ($i = 0; $i < 27; $i++)
      <div class="item-product-shop">
         <img src="{{asset('assets/images/img-sp-shop.jpg')}}" class="w-100">
         <div class="box-content-img">
            <p class="title-contnet-img">Vòng tay chuỗi liên kết Donna 14K [Nhỏ]</p>
            <p class="title-contnet-img">790.000 VND</p>
         </div>
      </div>
      @endfor
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