@if (count($advertisement)>0)
<div class="box-advertisement">
   <div class="content-adv">
      <div class="swiper mySwiperAdver">
         <div class="swiper-wrapper">
            @foreach ($advertisement as $index => $val)
            <div class="swiper-slide silde-adv">
               <img src="{{asset($val->src)}}" loading="lazy"/>
               <a class="slide-content-adv" @if($val->link != null) href="{{$val->link}}" @endif @if ($index == 0) style="display: block"  @endif>
                  <p class="title-slide-adv">{{$val->title}}</p>
                  <a @if($val->link != null) href="{{$val->link}}" @endif class="link-adv">Shop Now</a>
               </a>
             </div>
            @endforeach
          </div>
          <div class="swiper-scrollbar swiper-scrollbar-adv"></div>
        </div>
         <div thumbsSlider="" class="swiper swiperAdv">
            <div class="swiper-wrapper">
               @foreach ($advertisement as $item_advertisement)
               <div class="swiper-slide box-child-adv">
                  @if (count($item_advertisement->product)>0)
                     @foreach ($item_advertisement->product as $item)
                     <div class="item-child-adv">
                        <img src="{{asset($item->info->thumbnail_img)}}" class="img-child-sp" loading="lazy">
                        <div class="item-content-child-adv">
                           <p class="title-child-sp">{{$item->info->name}}</p>
                           <p class="price-sale">{{$item->info->current_stock}} won</p>
                           <p class="title-tag">#Limited Quantity #Natural Black Diamond_4mm</p>
                        </div>
                     </div>
                     @endforeach
                  @endif
               </div>
               @endforeach
            </div>
         </div>
      </div>
</div>
@endif
