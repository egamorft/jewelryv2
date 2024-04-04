<div class="box-advertisement">
   <div class="content-adv">
      <div class="swiper mySwiperAdver">
         <div class="swiper-wrapper">
            @for ($i = 0; $i < 5; $i++)
            <div class="swiper-slide silde-adv">
               <img src="{{asset('assets/images/slide.jpg')}}" />
               <div class="slide-content-adv" @if ($i == 0) style="display: block"  @endif>
                  <p class="title-slide-adv">Custom & Diamond Inside Coin Pendant</p>
                  <a href="" class="link-adv">Shop Now</a>
               </div>
             </div>
            @endfor

          </div>
          <div class="swiper-scrollbar swiper-scrollbar-adv"></div>
        </div>
         <div thumbsSlider="" class="swiper swiperAdv">
            <div class="swiper-wrapper">
               @for ($i = 0; $i < 5; $i++)
               <div class="swiper-slide box-child-adv">
                  <div class="item-child-adv">
                     <img src="{{asset('assets/images/sp-child.jpg')}}" class="img-child-sp">
                     <div class="item-content-child-adv">
                        <p class="title-child-sp">Donna Andy Classic Black Diamond Tennis Bracelet [4mm]</p>
                        <p class="price-sale">4,860,00 won</p>
                        <p class="title-tag">#Limited Quantity #Natural Black Diamond_4mm</p>
                     </div>
                  </div>
                  <div class="item-child-adv">
                     <img src="{{asset('assets/images/sp-child.jpg')}}" class="img-child-sp">
                     <div class="item-content-child-adv">
                        <p class="title-child-sp">Donna Andy Classic Black Diamond Tennis Bracelet [4mm]</p>
                        <p class="price-sale">4,860,00 won</p>
                        <p class="title-tag">#Limited Quantity #Natural Black Diamond_4mm</p>
                     </div>
                  </div>
               </div>
               @endfor
            
            </div>
         </div>
      </div>
   
      
</div>