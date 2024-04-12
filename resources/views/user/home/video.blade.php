@if (count($video) > 0)
<div class="box-outstanding">
   <p class="title-outstanding">DONA & D. TV</p>
   <div class="swiper mySwiperVideo">
      <div class="swiper-wrapper">
         @foreach ($video as $index => $item_video)
            <div class="swiper-slide box-item-video">
               <div class="item-video">
                  <video controls id="video{{$index}}" class="w-100" style="max-height: 700px" onplay="hideImage({{$index}})">
                     <source src="{{asset($item_video->src)}}" type="video/mp4">
                  </video>
                  <img src="{{asset('assets/images/Polygon.png')}}" id="image{{$index}}" class="icon-polygon" onclick="playVideo({{$index}})">
               </div>
               <a @if($item_video->link != null) href="{{$item_video->link}}" @endif target="_blank" class="no-link">
                     <span class="text-video">{{@$item_video->title}}</span>
                     <span class="text-video" style="font-weight: bold">{{@$item_video->describe}}</span>
               </a>
            </div>
         @endforeach 
      </div>
      <div class="swiper-button-next video-next"></div>
      <div class="swiper-button-prev video-prev"></div>
    </div>
</div>
@endif