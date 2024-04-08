@if (count($album)>0)
<div class="box-official">
   <p class="title-official">@dona_d_official</p>
   <div class="swiper mySwiperOfficial">
      <div class="swiper-wrapper" id="lightgallery">
         @foreach ($album as $item_album)
         <div class="swiper-slide" style="height: auto" data-src="{{asset($item_album->src)}}" data-lg-size="1600-1067">
            <img src="{{asset($item_album->src)}}"  class="w-100 h-100" style="object-fit: cover" loading="lazy">
           </div>
         @endforeach
      </div>
    </div>
</div>
@endif
