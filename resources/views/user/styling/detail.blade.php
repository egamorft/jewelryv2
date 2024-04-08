@extends('user.index')
@section('title','Detail Styling')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/styling.css')}}">
@stop

@section('content')
<div class="swiper mySwiperBannerStyling">
   <div class="swiper-wrapper" style="height: unset">
      @foreach ($styling_img as $val_img)
      <div class="swiper-slide">
         <img src="{{asset($val_img->src)}}" class="w-100">
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