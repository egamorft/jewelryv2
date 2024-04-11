@extends('user.index')
@section('title','Detail Product')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
@stop

@section('content')
<div class="box-detail-product">
   <div class="box-info-product">
      <div class="box-left-info-sp">
         <div class="swiper swiperDetailProduct">
            <div class="swiper-wrapper">
               @foreach(json_decode($product->photos) as $photo)
                  <div class="swiper-slide">
                     <img src="{{asset($photo)}}" class="w-100"/>
                  </div>
               @endforeach
            </div>
            <div class="swiper-scrollbar"></div>
         </div>
         <div class="box-info box-mobile-infor">
            <div class="box-title-info-sp">
               <p class="name-product">{{ $product->name }}</p>
               <div class="d-flex align-items-center">
                  @if($product->interest == 1)
                     <img src="{{asset('assets/images/heart-solid.svg')}}" class="icon-share heart-save" data-product-id="{{ $product->id }}">
                     @else 
                     <img src="{{asset('assets/images/heart.png')}}" class="icon-share heart-save" data-product-id="{{ $product->id }}">
                  @endif
                  <img src="{{asset('assets/images/share.png')}}" class="icon-share">
               </div>
            </div>
            @php
                  $discountEndTime = \Carbon\Carbon::parse($product->discount_end);
                  $currentDateTime = \Carbon\Carbon::now();
                  $remainingTime = $discountEndTime
                     ->diff($currentDateTime)
                     ->format('%a days %H:%I:%S');
             @endphp
             @if ($product->discount > 0 && $discountEndTime->isAfter($currentDateTime))
               <p class="price-info">{{ number_format($product->price) }} VND</p>
               @php
                  if ($product->discount_type == 'percent') {
                        $salePrice = $product->price - ($product->price * $product->discount) / 100;
                  } else {
                        $salePrice = $product->price - $product->discount;
                  }
               @endphp
                <div class="d-flex mb-3">
                  @if ($product->discount_type == 'percent')
                  <span class="percent-info">{{ $product->discount }}%</span>
                   @else
                     <span class="percent-info">-{{ number_format($product->discount) }} VND</span>
                  @endif
                  <span class="price-sale-info">{{ number_format($salePrice) }} VND</span>
               </div>
               <div class="d-flex mb-2">
                  <p class="title-info" >Discount period</p>
                  <p class="content-info">Remaining time: {{ $remainingTime }}</p>
               </div>
               <div class="d-flex mb-2">
                  <p class="title-info" >Reserves</p>
                  @if ($product->discount_type == 'percent')
                     <p class="content-info">{{$product->price - $salePrice}} VND ({{ $product->discount }}%)</p>
                  @else
                     <p class="content-info">{{ number_format($product->discount) }} VND</p>
                  @endif
               </div>
            @else
            <span class="price-sale-info">{{ number_format($product->price) }} VND</span>
            @endif
            <div class="d-flex mb-2">
               <p class="title-info" >interest-free installment</p>
               <p class="content-info">Information on interest-free benefits by credit card company</p>
            </div>

            <button class="btn-buy-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" onclick="addAttributeCart({{ $product->id }})">Shopping basket | purchase</button>

            <div class="accordion accordion-flush" id="accordionFlushExample">
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingOne">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     Spec & Details
                   </button>
                 </h2>
                 <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">{{ $product->spec_n_details }}</div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingTwo">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                     Delivery & Notice
                   </button>
                 </h2>
                 <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">{{ $product->delivery_n_notice }}</div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingThree">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                     A/S & Exchange
                   </button>
                 </h2>
                 <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">{{ $product->exchange }}</div>
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
               {!! $product->information !!}
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
                     @foreach ($related_products as $related)
                        <div class="swiper-slide">
                           <img src="{{asset($related->thumbnail_img)}}" class="w-100"/>
                           <p class="title-recommended-product">{{$related->name}}</p>
                           @php
                           $discountEndTime = \Carbon\Carbon::parse($related->discount_end);
                           $currentDateTime = \Carbon\Carbon::now();
                           $remainingTime = $discountEndTime->diff($currentDateTime)
                           ->format('%a days %H:%I:%S');
                       @endphp
                       @if ($related->discount > 0 && $discountEndTime->isAfter($currentDateTime))
                       @php
                       if ($related->discount_type == 'percent') {
                                                 $salePrice = $related->price - ($related->price * $related->discount) / 100;
                                             } else {
                                                 $salePrice = $related->price - $related->discount;
                                             }
                 @endphp
                           <p class="price-recommended-product">{{number_format($salePrice)}} VND</p>
                           @else
            <p class="price-recommended-product">{{number_format($related->price)}} VND</p>
             @endif
                        </div>
                     @endforeach
                  </div>
                  <div class="swiper-scrollbar"></div>
                </div>
            </div>
      </div>
     
      <div class="box-info box-desktop-infor">
            <div class="box-title-info-sp">
               <p class="name-product">{{ $product->name }}</p>
               <div class="d-flex align-items-center">
                  @if($product->interest == 1)
                     <img src="{{asset('assets/images/heart-solid.svg')}}" class="icon-share heart-save" data-product-id="{{ $product->id }}">
                     @else 
                     <img src="{{asset('assets/images/heart.png')}}" class="icon-share heart-save" data-product-id="{{ $product->id }}">
                  @endif
                  <img src="{{asset('assets/images/share.png')}}" class="icon-share">
               </div>
            </div>
            @php
                  $discountEndTime = \Carbon\Carbon::parse($product->discount_end);
                  $currentDateTime = \Carbon\Carbon::now();
                  $remainingTime = $discountEndTime
                     ->diff($currentDateTime)
                     ->format('%a days %H:%I:%S');
             @endphp
             @if ($product->discount > 0 && $discountEndTime->isAfter($currentDateTime))
               <p class="price-info">{{ number_format($product->price) }} VND</p>
               @php
                  if ($product->discount_type == 'percent') {
                        $salePrice = $product->price - ($product->price * $product->discount) / 100;
                  } else {
                        $salePrice = $product->price - $product->discount;
                  }
               @endphp
                <div class="d-flex mb-3">
                  @if ($product->discount_type == 'percent')
                  <span class="percent-info">{{ $product->discount }}%</span>
                   @else
                     <span class="percent-info">-{{ number_format($product->discount) }} VND</span>
                  @endif
                  <span class="price-sale-info">{{ number_format($salePrice) }} VND</span>
               </div>
               <div class="d-flex mb-2">
                  <p class="title-info" >Discount period</p>
                  <p class="content-info">Remaining time: {{ $remainingTime }}</p>
               </div>
               <div class="d-flex mb-2">
                  <p class="title-info" >Reserves</p>
                  @if ($product->discount_type == 'percent')
                     <p class="content-info">{{$product->price - $salePrice}} VND ({{ $product->discount }}%)</p>
                  @else
                     <p class="content-info">{{ number_format($product->discount) }} VND</p>
                  @endif
               </div>
            @else
            <span class="price-sale-info">{{ number_format($product->price) }} VND</span>
            @endif
            <div class="d-flex mb-2">
               <p class="title-info" >interest-free installment</p>
               <p class="content-info">Information on interest-free benefits by credit card company</p>
            </div>

            <button class="btn-buy-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" onclick="addAttributeCart({{ $product->id }})">Shopping basket | purchase</button>

            <div class="accordion accordion-flush" id="accordionFlushExamples">
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingOnes">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOnes" aria-expanded="false" aria-controls="flush-collapseOnes">
                     Spec & Details
                   </button>
                 </h2>
                 <div id="flush-collapseOnes" class="accordion-collapse collapse" aria-labelledby="flush-headingOnes" data-bs-parent="#accordionFlushExamples">
                   <div class="accordion-body">{{ $product->spec_n_details }}</div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingTwos">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwos" aria-expanded="false" aria-controls="flush-collapseTwos">
                     Delivery & Notice
                   </button>
                 </h2>
                 <div id="flush-collapseTwos" class="accordion-collapse collapse" aria-labelledby="flush-headingTwos" data-bs-parent="#accordionFlushExamples">
                   <div class="accordion-body">{{ $product->delivery_n_notice }}</div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingThrees">
                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThrees" aria-expanded="false" aria-controls="flush-collapseThrees">
                     A/S & Exchange
                   </button>
                 </h2>
                 <div id="flush-collapseThrees" class="accordion-collapse collapse" aria-labelledby="flush-headingThrees" data-bs-parent="#accordionFlushExamples">
                   <div class="accordion-body">{{ $product->exchange }}</div>
                 </div>
               </div>
             </div>

      </div>
   </div>


   </div>
   
</div>


@section('script_page')
<script src="{{asset('assets/js/product.js')}}"></script>
@stop