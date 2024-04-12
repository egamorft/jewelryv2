@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="title-area mt-5">
            <span class="mobile-only go-back" onclick="history.go(-1)"></span>
            <h2>PRODUCT OF INTEREST</h2>
        </div>

        <div class="xans-element- xans-myshop xans-myshop-wishlist xans-record- mt-5">
            <div class="sub-title pb-10 font-bold flex align-center justify-between">
                <div class="title">List of products of interest</div>
            </div>
            <div class=" ec-base-product">
                <ul class="xans-element- xans-myshop xans-myshop-wishlistitem wish-list mt-20 flex flex-wrap gap-10">
                    @foreach ($listProduct as $item)
                        <li class="prd-card wish-item soldout-displaynone-when-has-stock mb-30 xans-record- on-extra-sale">
                            <div class="thumbnail">
                                <a href="#"><img src="{{ asset($item->thumbnail_img) }}" alt=""
                                        class="loaded"></a>
                                <div class="wish-del">
                                    <a class="btn_wishlist_del" rel="6518||||">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.167" height="14"
                                            viewBox="0 0 15.167 14">
                                            <path
                                                d="M10.958,18.5l-1.1-.992C5.953,13.922,3.375,11.6,3.375,8.7A4.124,4.124,0,0,1,7.546,4.5a4.486,4.486,0,0,1,3.412,1.6,4.486,4.486,0,0,1,3.412-1.6,4.124,4.124,0,0,1,4.171,4.2c0,2.9-2.578,5.226-6.484,8.812Z"
                                                transform="translate(-3.375 -4.5)"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="description mt-20">
                                <div>
                                    <a href="{{ url('detail-product', $item->id) }}">{{ $item->name }}</a>
                                </div>
                                @php
                                    $discountEndTime = \Carbon\Carbon::parse($item->discount_end);
                                    $currentDateTime = \Carbon\Carbon::now();
                                @endphp
                                <ul class="spec font-bold mt-5 applied">
                                    <li class="prd-customer-price font-bold">
                                        @if ($item->discount > 0 && $discountEndTime->isAfter($currentDateTime))
                                            @php
                                                if ($item->discount_type == 'percent') {
                                                    $salePrice = $item->price - ($item->price * $item->discount) / 100;
                                                } else {
                                                    $salePrice = $item->price - $item->discount;
                                                }
                                            @endphp
                                            <span>
                                                {{ number_format($salePrice) }} VND<br>
                                            </span>
                                        @else
                                            <span>
                                                {{ number_format($item->price) }} VND<br>
                                            </span>
                                        @endif
                                    </li>
                                </ul>
                                <div class="btns mt-20">
                                    <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                        aria-controls="offcanvasRight" type="button"
                                        onclick="addAttributeCart({{ $item->id }})" class="btn prior-2 is-small ">Put in
                                        a shopping cart</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="xans-element- xans-myshop xans-myshop-wishlistpaging ec-base-paginate">
            <!-- product and basic pagination -->
            <div class="flex justify-center align-center">
                <a href="{{ $listProduct->previousPageUrl() ?? '#' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                        <g transform="translate(-877.5 -600)">
                            <path d="M-19057.816-16469.5l-5,5,5,5" transform="translate(19961.816 17083)" fill="none"
                                stroke="#000" stroke-width="1"></path>
                            <rect width="48" height="38" transform="translate(877.5 600)" fill="none">
                            </rect>
                        </g>
                    </svg>
                </a>
                <ol class="flex justify-center align-center">
                    @for ($page = 1; $page <= $listProduct->lastPage(); $page++)
                        {{-- <a class="{{ $page == $listProduct->currentPage() ? ' fw-bold' : '' }}"
                            href="{{ $listProduct->url($page) }}">
                            {{ $page }}
                        </a> --}}
                        <li class="xans-record-"><a href="{{ $listProduct->url($page) }}"
                                class="this">{{ $page }}</a></li>
                    @endfor
                </ol>
                <a href="{{ $listProduct->nextPageUrl() ?? '#' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                        <g transform="translate(-540 -859)">
                            <path d="M-19062.814-16469.5l5,5-5,5" transform="translate(19624.314 17342)" fill="none"
                                stroke="#000" stroke-width="1"></path>
                            <rect width="48" height="38" transform="translate(540 859)" fill="none">
                            </rect>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
