@if (count($banner)>0)
<img src="{{asset($banner[0]->src)}}" class="img-banner-big" loading="lazy">
@endif
@if (count($banner)>1)
<div class="swiper mySwiperBanner">
   <div class="swiper-wrapper">
      @foreach ($banner as $index => $item_banner)
         @if ($index > 0 && $index < 7)
            <a class="swiper-slide" @if($item_banner->link != null) href="{{$item_banner->link}}" @endif>
               <img src="{{asset($item_banner->src)}}" class="w-100" loading="lazy">
               <div class="box-content-banner">
                  <p class="title-slide-banner">{{@$item_banner->title}}</p>
                  <p class="content-slide-banner">{{@$item_banner->describe}}</p>
               </div>
            </a>
         @endif
      @endforeach
   </div>
   <div class="swiper-scrollbar"></div>
 </div>
@endif
