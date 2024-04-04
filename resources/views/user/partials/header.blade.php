<div class="box-header">
   <div class="d-flex align-item-center">
      <div class="item-text-header" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuTop"
         aria-controls="offcanvasMenuTop">SHOP</div>
      <a class="item-text-header">STYLING</a>
      <a class="item-text-header">LIVE</a>
      <a class="item-text-header">HANNAM SHOWROOM</a>
   </div>
   <img src="{{asset('assets/images/jewelry.png')}}" class="img-logo">
   <div class="d-flex align-item-center">
      <a href="">
         <img src="{{asset('assets/images/search-sm.png')}}" class="icon-header" data-bs-toggle="offcanvas"
         data-bs-target="#offcanvasSearchTop" aria-controls="offcanvasSearchTop">
      </a>
      <a href="">
         <img src="{{asset('assets/images/heart.png')}}" class="icon-header">
      </a>
      <a href="{{ Auth::check() ? route('profile.index') : route('auth.member.login') }}">
         <img src="{{asset('assets/images/user-03.png')}}" class="icon-header">
      </a>
      
      <a href="">
         <div class="position-relative">
            <img src="{{asset('assets/images/Icon.png')}}" class="icon-header">
            <div class="point-cart">0</div>
         </div>
      </a>

   </div>
</div>

<div class="box-header-mobile">
   <img src="{{asset('assets/images/jewelry.png')}}" class="img-logo">
   <div class="d-flex align-item-center">
      <img src="{{asset('assets/images/search-sm.png')}}" class="icon-header" data-bs-toggle="offcanvas"
         data-bs-target="#offcanvasSearchTop" aria-controls="offcanvasSearchTop">
      <img src="{{asset('assets/images/user-03.png')}}" class="icon-header">
      <div class="position-relative">
         <img src="{{asset('assets/images/Icon.png')}}" class="icon-header">
         <div class="point-cart">0</div>
      </div>

   </div>
</div>

<!-- search -->
<div class="offcanvas offcanvas-search-top" tabindex="-1" id="offcanvasSearchTop"
   aria-labelledby="offcanvasSearchTopLabel">
   <button type="button" class="btn-close btn-close-search" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   <div class="offcanvas-body offcanvas-body-header-search">
      <div class="content-search">
         <div class="d-flex justify-content-between align-items-center">
            <div class="box-search-header">
               <svg id="acc-icon-search" xmlns="http://www.w3.org/2000/svg" width="20.707" height="20.556"
                  viewBox="0 0 20.707 20.556">
                  <g transform="translate(-3992 -55.624)">
                     <g transform="translate(3992 55.624)" fill="none" stroke="#000" stroke-miterlimit="10"
                        stroke-width="2">
                        <circle cx="8.024" cy="8.024" r="8.024" stroke="none"></circle>
                        <circle cx="8.024" cy="8.024" r="7.024" fill="none"></circle>
                     </g>
                     <line x2="6.231" y2="6.231" transform="translate(4005.77 69.243)" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2"></line>
                  </g>
               </svg>
               <input type="text" class="input-search-header">
            </div>
            <svg class="btnSearch" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="21.413"
               height="17.414" viewBox="0 0 21.413 17.414" index="0">
               <g id="gr_4018" data-name="gr 4018" transform="translate(-13444.5 114.207)">
                  <line id="line_2593" data-name="line 2593" x2="20" transform="translate(13444.5 -105.5)" fill="none"
                     stroke="#000" stroke-width="2"></line>
                  <path id="pth_9795" data-name="pth 9795" d="M13540-64l8,8-8,8" transform="translate(-83.497 -49.496)"
                     fill="none" stroke="#000" stroke-width="2"></path>
               </g>
            </svg>
         </div>

         <div class="content-header-search">
            <p class="title-popular">Tìm kiếm phổ biến</p>
            <div class="box-popular">
               <p class="item-popular">1. Ngọc trai</p>
            </div>
         </div>

      </div>
   </div>
</div>

<!-- menu -->
<div class="offcanvas offcanvas-menu-top" tabindex="-1" id="offcanvasMenuTop" aria-labelledby="offcanvasMenuTopLabel">
   <div class="offcanvas-body box-menu-header">
      <div class="col-item-menu">
         <a href="" class="text-item-menu">HERITAGE LINE</a>
         <a href="" class="text-item-menu">EVERYDAY LINE</a>
         <a href="" class="text-item-menu">NEW in</a>
         <a href="" class="text-item-menu">HOMME</a>
         <a href="" class="text-item-menu">COLLECTION</a>
         <a href="" class="text-item-menu">Vintage Watch</a>
         <a href="" class="text-item-menu">Design things</a>
         <a href="" class="text-item-menu">VIEW ALL</a>
      </div>
      <div class="col-item-menu">
         <a href="" class="content-item-menu">HERITAGE LINE</a>
         <a href="" class="content-item-menu">EVERYDAY LINE</a>
         <a href="" class="content-item-menu">NEW in</a>
         <a href="" class="content-item-menu">HOMME</a>
         <a href="" class="content-item-menu">COLLECTION</a>
         <a href="" class="content-item-menu">Vintage Watch</a>
         <a href="" class="content-item-menu">Design things</a>
         <a href="" class="content-item-menu">VIEW ALL</a>
      </div>
      <div class="col-item-menu-right">
         <a href="" class="content-item-menu">HERITAGE LINE</a>
         <a href="" class="content-item-menu">EVERYDAY LINE</a>
         <a href="" class="content-item-menu">NEW in</a>
      </div>
      <div class="col-item-menu-right">
         <img src="{{asset('assets/images/img-header.jpg')}}" class="w-100">
      </div>
   </div>
</div>