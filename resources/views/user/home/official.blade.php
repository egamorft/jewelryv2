<div class="box-official">
   <p class="title-official">@dona_d_official</p>
   <div class="swiper mySwiperOfficial">
      <div class="swiper-wrapper" id="lightgallery">
         @for ($i = 0; $i < 10; $i++)
         <div class="swiper-slide" data-src="{{asset('assets/images/img-header.jpg')}}" data-lg-size="1600-1067">
            <img src="{{asset('assets/images/img-header.jpg')}}"  class="w-100" loading="lazy">
           </div>
         @endfor
       
      </div>
    </div>
  
</div>