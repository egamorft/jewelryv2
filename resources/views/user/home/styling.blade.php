<div class="box-outstanding">
   <div class="d-flex justify-content-between align-items-center">
      <p class="title-outstanding">DONA & D. styling</p>
      <a href="" class="link-view-all">View All</a>
   </div>
   <div class="swiper mySwiperStyling">
      <div class="swiper-wrapper">
         @for ($i = 0; $i < 8; $i++)
         <div class="swiper-slide">
            <img src="{{asset('assets/images/imagesp6.png')}}" loading="lazy" class="w-100">
            <p class="title-styling">DONA Solitaire Diamond Ring styling</p>
            <p class="content-styling">Solitaire ring with a timeless design that you can keep for a lifetime, 1 carat, 5-quarter size styling.</p>
           </div>
         @endfor
       
      </div>
    </div>
</div>

<div class="box-banner-home">
   @if (count($banner)>=7 && $banner[7])
      <a @if($banner[7]->link != null) href="{{$banner[7]->link}}" @endif class="item-img-banner-home">
         <img src="{{asset($banner[7]->src)}}" class="w-100" loading="lazy">
      </a>
   @endif
   @if (count($banner)>=8 && $banner[8])
      <a @if($banner[8]->link != null) href="{{$banner[8]->link}}" @endif class="item-img-banner-home">
         <img src="{{asset($banner[8]->src)}}" class="w-100" loading="lazy">
      </a>
   @endif
</div>