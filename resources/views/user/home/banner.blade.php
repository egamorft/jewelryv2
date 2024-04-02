<img src="{{asset('assets/images/banner.png')}}" class="img-banner-big">
<div class="swiper mySwiperBanner">
   <div class="swiper-wrapper">
      @for ($i=0; $i<10;$i++)
      <div class="swiper-slide">
         <img src="{{asset('assets/images/image.png')}}" class="w-100">
         <div class="box-content-banner">
            <p class="title-slide-banner">HELLO DONNAS 
               If this is your first time at 
               Dona&D,</p>
            <p class="content-slide-banner">Dona&D introductory item recommendation for new Donath users</p>
         </div>
      </div>
      @endfor
   </div>
   <div class="swiper-scrollbar"></div>
 </div>