@extends('user.index')
@section('title','Detail Product')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
@stop

@section('content')
<div class="box-detail-product">
   <div class="box-info-product">
      <div class="swiper swiperDetailProduct">
         <div class="swiper-wrapper">
            @for ($i = 0; $i < 5; $i++)
               <div class="swiper-slide">
                  <img src="{{asset('assets/images/img-detail-sp.jpg')}}" class="w-100"/>
               </div>
            @endfor
         </div>
         <div class="swiper-scrollbar"></div>
       </div>
      <div class="box-info">
            <div class="box-title-info-sp">
               <p class="name-product">Donna Andy Classic Black Diamond Tennis Bracelet [4mm]</p>
               <div class="d-flex align-items-center">
                  <img src="{{asset('assets/images/heart.png')}}" class="icon-share">
                  <img src="{{asset('assets/images/share.png')}}" class="icon-share">
               </div>
            </div>
            <p class="price-info">5,400,000 won</p>
            <div class="d-flex mb-3">
               <span class="percent-info">10%</span>
               <span class="price-sale-info">4,860,000 won</span>
            </div>
            <div class="d-flex mb-2">
               <p class="title-info" >Discount period</p>
               <p class="content-info">Remaining time: 6 days 05:33:30 (540,000 won discount)</p>
            </div>
            <div class="d-flex mb-2">
               <p class="title-info" >Reserves</p>
               <p class="content-info">48,600 won (1%)</p>
            </div>
            <div class="d-flex mb-2">
               <p class="title-info" >interest-free installment</p>
               <p class="content-info">Information on interest-free benefits by credit card company</p>
            </div>

            <button class="btn-buy-cart">Shopping basket | purchase</button>

            <div class="accordion accordion-flush" id="accordionFlushExample">
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingOne">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     Spec & Details
                   </button>
                 </h2>
                 <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">gold _ 14K 18K
                     gold color _ Yellow | Pink | White | Natural
                     Weight _ 6.8g (based on 14K 17.5cm)
                     Stone _ Natural black diamond 4mm  
                     After production is completed, length extension and shortening A/S are available. 
                     We recommend choosing a size that is 1 to 1.5 cm larger than your wrist circumference.﻿
                     Model wearing _ 14K yellow gold </div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingTwo">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                     Delivery & Notice
                   </button>
                 </h2>
                 <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">- This is a custom-made product and takes approximately 10-14 days to produce. - Free shipping via fast and safe post office delivery. - For purchases under 50,000 won, shipping fee of 3,000 won is automatically prepaid and there is no additional charge for Jeju Island and other islands. - When depositing via bank transfer, orders not paid within 7 days will be automatically cancelled. - In the case of mobile phone payments, cancellation is only possible in the month of payment, and a cancellation fee will be charged if cancellation is made in the month following payment.</div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingThree">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                     A/S & Exchange
                   </button>
                 </h2>
                 <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">- The products you order are individually custom-made one by one according to the option you have selected, so exchanges or returns are not possible due to a simple change of mind after purchase. - Exchange, return, or compensation for damage or loss due to carelessness when wearing the product is not possible. - If the product is defective, it can be exchanged or returned for the same product. Please contact customer service within 1 day of receiving the product.</div>
                 </div>
               </div>
             </div>

      </div>
   </div>

   <div class="box-infor-more-sp">
         <div class="line-header-more">
            <a href="" class="item-header-more item-header-more-active">Product Information</a>
            <a href="#review" class="item-header-more">review</a>
            <a href="#recommended-products" class="item-header-more">suggestion</a>
         </div>
         <div class="content-info-product-more">
            Be sure to check before purchasing!
            - Tennis bracelets are handcrafted one by one and made only by certified artisans.
            - Black diamond bracelets are made by directly ordering and importing a set quantity of natural diamonds and going through a rigorous selection process.
            It is produced in limited quantities and may take a long time to be restocked if sold out, so please keep this in mind when ordering.
            
            - The production period for natural black diamonds is expected to take approximately 6 to 8 weeks.
         </div>

         <div class="box-review" id="review">
               <div class="line-header-review">
                  <p class="title-review">REVIEW (0)</p>
                  <a href="" class="see-all">See all product reviews</a>
               </div>
               <div class="box-star">
                     <div class="number-star">
                           <div class="d-flex">
                              <img src="{{asset('assets/images/star.png')}}" class="icon-star-review">
                              <p class="star-number-review">5</p>
                           </div>
                           <a href="" class="btn-write-review">Write a product review</a>
                     </div>
                     <div class="list-star">
                        <div class="item-list-star">
                           <span class="tag-star">Very good</span>
                           <div class="line-percent">
                              <div class="percent-content" style="width: 50%;"></div>
                           </div>
                           <span>516</span>
                        </div>
                        <div class="item-list-star">
                           <span class="tag-star">I love it</span>
                           <div class="line-percent">
                              <div class="percent-content" style="width: 40%;"></div>
                           </div>
                           <span>16</span>
                        </div>
                        <div class="item-list-star">
                           <span class="tag-star">It's normal</span>
                           <div class="line-percent">
                              <div class="percent-content" style="width: 50%;"></div>
                           </div>
                           <span>5</span>
                        </div>
                        <div class="item-list-star">
                           <span class="tag-star">Not too bad</span>
                           <div class="line-percent">
                              <div class="percent-content" style="width: 50%;"></div>
                           </div>
                           <span>51</span>
                        </div>
                        <div class="item-list-star">
                           <span class="tag-star">Not good</span>
                           <div class="line-percent">
                              <div class="percent-content" style="width: 50%;"></div>
                           </div>
                           <span>16</span>
                        </div>
                     </div>
               </div>
               <div class="box-search-latest">
                  <select name="" class="select-filter">
                     <option value="">Recommended</option>
                     <option value="">Latest</option>
                     <option value="">Sort by star rating</option>
                     <option value="">Sort reviews by </option>
                  </select>
                  <div class="box-search-review">
                     <img src="{{asset('assets/images/Search.png')}}" class="icon-search-review" >
                     <input type="text" class="title-content-search" placeholder="Review keyword search">
                  </div>
               </div>
               <div class="box-rate-range">
                  <div class="dropdown">
                     <button class="btn btn-rate dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Rating
                     </button>
                     <ul class="dropdown-menu">
                       <li class="item-li-rate">
                        <span style="font-size: 14px;font-weight: bold">Scope</span>
                        <div class="d-fle"><img src="{{asset('assets/images/reset.png')}}" style="width: 12px"><span style="font-size: 14px;margin-left: 5px">reset</span></div>
                     </li>
                       <li class="item-li-rate-child border-top-0">
                        <div class="box-rate-name">
                           @for ($i = 0; $i < 5; $i++)
                           <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                           @endfor
                           <span style="font-size: 14px">Very good</span>
                        </div>
                        <input type="checkbox">
                       </li>
                       <li class="item-li-rate-child">
                        <div class="box-rate-name">
                           @for ($i = 0; $i < 4; $i++)
                           <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                           @endfor
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <span style="font-size: 14px">I love it</span>
                        </div>
                        <input type="checkbox">
                       </li>
                       <li class="item-li-rate-child">
                        <div class="box-rate-name">
                           @for ($i = 0; $i < 3; $i++)
                           <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                           @endfor
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <span style="font-size: 14px">It's normal</span>
                        </div>
                        <input type="checkbox">
                       </li>
                       <li class="item-li-rate-child">
                        <div class="box-rate-name">
                           @for ($i = 0; $i < 2; $i++)
                           <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                           @endfor
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           <span style="font-size: 14px">Not too bad</span>
                        </div>
                        <input type="checkbox">
                       </li>
                       <li class="item-li-rate-child">
                        <div class="box-rate-name">
                           <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                           @for ($i = 0; $i < 4; $i++)
                           <img src="{{asset('assets/images/Icon-star.png')}}" class="icon-rate-name">
                           @endfor
                           <span style="font-size: 14px">Not good</span>
                        </div>
                        <input type="checkbox">
                       </li>
                       <li>
                        <button class="btn-complete">Complete</button>
                       </li>
                     </ul>
                  </div>
                  <div class="dropdown mx-3">
                     <a class="btn btn-rate dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Dropdown link
                     </a>
                  
                     <ul class="dropdown-menu">
                        <li class="item-li-rate">
                           <span style="font-size: 14px;font-weight: bold">Age</span>
                           <div class="d-fle"><img src="{{asset('assets/images/reset.png')}}" style="width: 12px"><span style="font-size: 14px;margin-left: 5px">reset</span></div>
                        </li>
                     <li class="d-flex align-items-center flex-wrap">
                              <div class="item-age">teenager</div>
                              <div class="item-age">20’s</div>
                              <div class="item-age">30’s</div>
                              <div class="item-age">Over 40s</div>
                     </li>
                     <li>
                        <button class="btn-complete">Complete</button>
                     </li>
                     </ul>
                  </div>
               </div>
               <div class="content-review">
                     <div class="item-content-review">
                           <div class="item-left-review">
                                 <div class="d-flex align-items-center">
                                    @for ($i = 0; $i < 5; $i++)
                                       <img src="{{asset('assets/images/star.png')}}" class="icon-rate-name">
                                    @endfor
                                       <span style="font-size: 14px">Very good</span>
                                 </div>
                                 <div class="comment">
                                    Donna Andy Classic Black Diamond Tennis Bracelet [4mm]
                                    5,400,000 won Donna Andy Classic Black Diamond Tennis Bracelet [4mm]
                                    5,400,000 won
                                 </div>
                                 <div class="swiper mySwiperComment">
                                    <div class="swiper-wrapper">
                                       @for ($i = 0; $i < 7; $i++)
                                          <div class="swiper-slide">
                                             <img src="{{asset('assets/images/img-header.jpg')}}" class="w-100">
                                          </div>
                                       @endfor
                                    </div>
                                  </div>
                           </div>
                           <div class="item-right-review">
                                 <p style="font-size: 13px;margin-bottom: 5px">Donna Andy Classic Black Diamond </p>
                                 <p style="font-size: 13px;margin-bottom: 5px">Solitaire ring with a timeless design that you can keep for a lifetime, 1 carat, 5-quarter size styling.</p>
                           </div>
                     </div>
               </div>
            </div>
         </div>

         <div id="recommended-products">
            <p class="title-big-recommended">Recommended products</p>
            <div class="swiper recommendedProducts">
               <div class="swiper-wrapper">
                  @for ($i = 0; $i < 5; $i++)
                     <div class="swiper-slide">
                        <img src="{{asset('assets/images/img-detail-sp.jpg')}}" class="w-100"/>
                        <p class="title-recommended-product">Donna Andy Classic Black Diamond Tennis Bracelet [4mm]</p>
                        <p class="price-recommended-product">4,860,00 won</p>
                     </div>
                  @endfor
               </div>
               <div class="swiper-scrollbar"></div>
             </div>
         </div>

   </div>
   
</div>


@section('script_page')
<script src="{{asset('assets/js/product.js')}}"></script>
@stop