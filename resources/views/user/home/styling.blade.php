<div class="box-outstanding">
   <div class="d-flex justify-content-between align-items-center">
      <p class="title-outstanding">DONA & D. styling</p>
      <a href="{{url('styling')}}" class="link-view-all">View All</a>
   </div>
   <div class="swiper mySwiperStyling">
      <div class="swiper-wrapper">
         @foreach ($styling as $val_styling)
         <a href="{{url('detail-styling',$val_styling->id)}}"  class="swiper-slide">
            <img src="{{asset($val_styling->src)}}" loading="lazy" class="w-100 h-100">
            <p class="title-styling">{{$val_styling->title}}</p>
            <p class="content-styling">{{$val_styling->describe}}</p>
           </a>
         @endforeach
       
      </div>
    </div>
</div>

<div class="box-banner-home">
   @if (count($banner)>=7 && isset($banner[7]))
      <a @if($banner[7]->link != null) href="{{$banner[7]->link}}" @endif class="item-img-banner-home">
         <img src="{{asset($banner[7]->src)}}" class="w-100 h-100" style="object-fit: cover" loading="lazy">
      </a>
   @endif
   @if (count($banner)>=8 && isset($banner[8]))
      <a @if($banner[8]->link != null) href="{{$banner[8]->link}}" @endif class="item-img-banner-home">
         <img src="{{asset($banner[8]->src)}}" class="w-100 h-100" style="object-fit: cover" loading="lazy">
      </a>
   @endif
</div>