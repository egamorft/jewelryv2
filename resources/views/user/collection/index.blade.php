@extends('user.index')
@section('title','Collection')

@section('style_page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@stop

@section('content')
<div class="box-category">
   <p class="title-category">{{$collection->title}}</p>
   @if ($collection->banner != null)
      <img src="{{asset($collection->banner)}}" class="w-100">
   @endif
   <div class="box-header-menu-category">
      <div class="item-menu-category">
         @foreach ($data_collection as $item_coll)
         <a href="{{url('detail-collection',$item_coll->id)}}" class="title-menu-category @if($item_coll->id == $collection->id) menu-category-active @endif">{{$item_coll->title}}</a>
         @endforeach
      </div>
      <div class="item-menu-category-icon">
         <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter" style="cursor: pointer">Filter</span>
         <select name="" class="select-filter-category">
            <option value="">Sắp xếp theo</option>
            <option value="">Giá thấp</option>
            <option value="">Giá cao</option>
            <option value="">Mặt hàng phổ biến</option>
            <option value="">Đánh giá</option>
         </select>
         <svg xmlns="http://www.w3.org/2000/svg" class="svg-expand" width="18" height="18" viewBox="0 0 14 14"><g transform="translate(-304 -187)"><rect width="6" height="6" transform="translate(304 187)"></rect><rect width="6" height="6" transform="translate(312 187)"></rect><rect width="6" height="6" transform="translate(304 195)"></rect><rect width="6" height="6" transform="translate(312 195)"></rect></g></svg>
         <svg xmlns="http://www.w3.org/2000/svg" class="svg-collapse" width="18" height="18" viewBox="0 0 14 14"><g transform="translate(-325 -187)"><rect width="3.818" height="6" transform="translate(325 187)" fill="#ddd"></rect><rect width="3.818" height="6" transform="translate(330.091 187)" fill="#ddd"></rect><rect width="3.818" height="6" transform="translate(335.182 187)" fill="#ddd"></rect><rect width="3.818" height="6" transform="translate(325 195)" fill="#ddd"></rect><rect width="3.818" height="6" transform="translate(330.091 195)" fill="#ddd"></rect><rect width="3.818" height="6" transform="translate(335.182 195)" fill="#ddd"></rect></g></svg>
      </div>
   </div>
   <div class="box-product-category box-product-category-four">
      @foreach ($collection_product as $product_item)
      <a href="{{url('detail-product',$product_item->info->id)}}" class="item-product">
         <img src="{{asset('assets/images/Icon.png')}}" class="icon-cart-product" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" onclick="addAttributeCart({{ $product_item->info->id }})">
         @if($product_item->interest == 1)
         <img src="{{asset('assets/images/heart-solid.svg')}}" class="icon-heart-product" data-product-id="{{ $product_item->info->id }}">
         @else 
         <img src="{{asset('assets/images/heart.png')}}" class="icon-heart-product" data-product-id="{{ $product_item->info->id }}">
         @endif
            <img src="{{asset($product_item->info->thumbnail_img)}}" class="w-100">
         <div class="box-info-sp">
            <p class="title-product">{{$product_item->info->name}}</p>
            @php
                $discountEndTime = \Carbon\Carbon::parse($product_item->info->discount_end);
                $currentDateTime = \Carbon\Carbon::now();
                $remainingTime = $discountEndTime->diff($currentDateTime)
                ->format('%a days %H:%I:%S');
            @endphp
            @if($product_item->info->discount > 0 && $discountEndTime->isAfter($currentDateTime))
            <p class="price">{{number_format($product_item->info->price)}} VND</p>
            @php
                  if ($product_item->info->discount_type == 'percent') {
                                            $salePrice = $product_item->info->price - ($product_item->info->price * $product_item->info->discount) / 100;
                                        } else {
                                            $salePrice = $product_item->info->price - $product_item->info->discount;
                                        }
            @endphp
             <div class="d-flex justify-content-between flex-wrap">
              <div class="box-item-price">
                   <p class="price-sale">{{ number_format($salePrice)}} VND</p>
                   @if ($product_item->info->discount_type == 'percent')
                                                <p class="percent-sale">{{ $product_item->info->discount }}%</p>
                                            @else
                                                <p class="percent-sale">
                                                    -{{ number_format($product_item->info->discount, 0, '.', ',') }} VND</p>
                                            @endif
              </div>
              <div class="box-time-sp">
                 <img src="{{asset('assets/images/clock.png')}}" class="icon-clock">
                 <p class="title-time">Time remaining: {{ $remainingTime }}</p>
              </div>
           </div>
           @else
           <div class="d-flex justify-content-between flex-wrap">
              <div class="box-item-price">
                  <p class="price-sale">{{ number_format($product_item->info->price, 0, '.', ',') }} đ</p>
              </div>
            </div>
            @endif
         </div>
       </a>
      @endforeach
   </div>
   <div class="w-100 d-flex justify-content-center mt-5">
      <a class="btn-more-sp">Xem thêm</a>
   </div>
</div>

<div class="box-filter-mobile">
   <svg id="m-layout-standard" style="display: none" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" onclick="fourActive()" class="selected"><g transform="translate(-304 -187)"><rect width="6" height="6" transform="translate(304 187)"></rect><rect width="6" height="6" transform="translate(312 187)"></rect><rect width="6" height="6" transform="translate(304 195)"></rect><rect width="6" height="6" transform="translate(312 195)"></rect></g></svg>

   <svg id="m-layout-wide" onclick="sixActive()" class="selected" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><g transform="translate(-325 -187)"><rect width="3.818" height="6" transform="translate(325 187)"></rect><rect width="3.818" height="6" transform="translate(330.091 187)"></rect><rect width="3.818" height="6" transform="translate(335.182 187)"></rect><rect width="3.818" height="6" transform="translate(325 195)"></rect><rect width="3.818" height="6" transform="translate(330.091 195)"></rect><rect width="3.818" height="6" transform="translate(335.182 195)"></rect></g></svg>

   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSort" aria-controls="offcanvasSort"><g transform="translate(-11740.5 18354.5)"><line x2="18" transform="translate(11740.5 -18353.5)" fill="none" stroke="#000" stroke-width="2"></line><line x2="12" transform="translate(11743.5 -18348.5)" fill="none" stroke="#000" stroke-width="2"></line><line x2="6" transform="translate(11746.5 -18343.5)" fill="none" stroke="#000" stroke-width="2"></line></g></svg>

   <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter" width="18" height="15" viewBox="0 0 18 15"><g transform="translate(-11800.5 18356)"><g transform="translate(507 3)"><line x2="4" transform="translate(11293.5 -18355.5)" fill="none" stroke="#000" stroke-width="2"></line><line x2="10" transform="translate(11301.5 -18355.5)" fill="none" stroke="#000" stroke-width="2"></line><g transform="translate(11296 -18359)" fill="none" stroke="#000" stroke-width="2"><circle cx="3.5" cy="3.5" r="3.5" stroke="none"></circle><circle cx="3.5" cy="3.5" r="2.5" fill="none"></circle></g></g><g transform="translate(11800.5 -18348)"><line x1="4" transform="translate(14 3.5)" fill="none" stroke="#000" stroke-width="2"></line><line x1="10" transform="translate(0 3.5)" fill="none" stroke="#000" stroke-width="2"></line><g transform="translate(8.5)" fill="none" stroke="#000" stroke-width="2"><circle cx="3.5" cy="3.5" r="3.5" stroke="none"></circle><circle cx="3.5" cy="3.5" r="2.5" fill="none"></circle></g></g></g></svg>
</div>

{{-- Sort --}}
<div class="offcanvas offcanvas-end box-offcanvas" data-bs-backdrop="false" tabindex="-1" id="offcanvasSort" aria-labelledby="offcanvasScrollingLabel">
   <div class="offcanvas-header d-flex align-items-center" style="padding: 20px">
      <svg xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="offcanvas" aria-label="Close" width="17.413" height="17.413" viewBox="0 0 17.413 17.413"><g transform="translate(1.413 0.707)"><line x1="16" transform="translate(0 8)" fill="none" stroke="#000" stroke-width="2"></line><path d="M13548-64l-8,8,8,8" transform="translate(-13539.995 64.004)" fill="none" stroke="#000" stroke-width="2"></path></g></svg>
     <h5 class="offcanvas-title title-offcanvas" id="offcanvasScrollingLabel">SẮP XẾP THEO</h5>
   </div>
   <div class="offcanvas-body body-offcanvas">
      <a href="" class="item-mobile-filter">sản phẩm mới nhất</a>
      <a href="" class="item-mobile-filter">giá thấp</a>
      <a href="" class="item-mobile-filter">giá cao</a>
      <a href="" class="item-mobile-filter">mặt hàng phổ biến</a>
      <a href="" class="item-mobile-filter">đánh giá</a>
   </div>
 </div>

{{-- Filter --}}
<div class="offcanvas offcanvas-end box-offcanvas" data-bs-backdrop="false" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasScrollingLabel">
   <div class="offcanvas-header d-flex align-items-center" style="padding: 20px">
      <svg xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="offcanvas" aria-label="Close" width="17.413" height="17.413" viewBox="0 0 17.413 17.413"><g transform="translate(1.413 0.707)"><line x1="16" transform="translate(0 8)" fill="none" stroke="#000" stroke-width="2"></line><path d="M13548-64l-8,8,8,8" transform="translate(-13539.995 64.004)" fill="none" stroke="#000" stroke-width="2"></path></g></svg>
     <h5 class="offcanvas-title title-offcanvas" id="offcanvasScrollingLabel">LỌC</h5>
   </div>
   <div class="offcanvas-body body-offcanvas">
      <div class="accordion" id="accordionExample">
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingOne">
             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
               giá
             </button>
           </h2>
           <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
             <div class="accordion-body">
             
              <div class="price-range-slider">              
                <div id="slider-range" class="range-bar"></div>
                <p class="range-value">
                  <input type="text" id="amount-min" readonly>
                  <input type="text" id="amount-max" style="text-align: right" readonly>
                </p>
              </div>

             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingTwo">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               cục đá
             </button>
           </h2>
           <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
             <div class="accordion-body">
                  <div class="item-filter">Kim cương</div>
                  <div class="item-filter">Ngọc trai</div>
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingThree">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               bộ sưu tập
             </button>
           </h2>
           <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
             <div class="accordion-body">
               <div class="item-filter">di sản</div>
               <div class="item-filter">Ngọc trai</div>
             </div>
           </div>
         </div>

         <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                dấu thăng
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <div class="item-filter">Khắc</div>
                  <div class="item-filter">Mang tính biểu tượng</div>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                loại
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <div class="item-filter">Vòng cổ</div>
                  <div class="item-filter">Phân lớp</div>
              </div>
            </div>
          </div>
       </div>

       <div class="box-footer-filter">
          <button class="btn-reset">Cài lại</button>
          <button class="btn-filter">Tìm kiếm</button>
       </div>
   
      </div>
 </div>

 @stop

 @section('script_page')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/category.js')}}"></script>

@stop