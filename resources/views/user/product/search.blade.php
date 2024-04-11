@extends('user.index')
@section('title', 'Search product')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@endsection
{{-- content of page --}}
@section('content')
    <div class="box-category">
        <div class="container">
            <div class="d-flex justify-content-center mb-3">
                <h4 class="fw-bold text-uppercase">Search</h4>
            </div>
            <form id="search-form" action="{{ route('search') }}" method="GET">
                <div class="d-flex justify-content-center">
                    <div class="content-search">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="box-search-header">
                                <svg id="acc-icon-search" xmlns="http://www.w3.org/2000/svg" width="20.707" height="20.556"
                                    viewBox="0 0 20.707 20.556">
                                    <g transform="translate(-3992 -55.624)">
                                        <g transform="translate(3992 55.624)" fill="none" stroke="#000"
                                            stroke-miterlimit="10" stroke-width="2">
                                            <circle cx="8.024" cy="8.024" r="8.024" stroke="none"></circle>
                                            <circle cx="8.024" cy="8.024" r="7.024" fill="none"></circle>
                                        </g>
                                        <line x2="6.231" y2="6.231" transform="translate(4005.77 69.243)"
                                            fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"></line>
                                    </g>
                                </svg>
                                <input id="search-input" type="text" class="input-search-header" name="q"
                                    placeholder="Search your product">
                            </div>
                            <svg id="btnSearch" class="btnSearch" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg"
                                width="21.413" height="17.414" viewBox="0 0 21.413 17.414" index="0">
                                <g id="gr_4018" data-name="gr 4018" transform="translate(-13444.5 114.207)">
                                    <line id="line_2593" data-name="line 2593" x2="20"
                                        transform="translate(13444.5 -105.5)" fill="none" stroke="#000"
                                        stroke-width="2">
                                    </line>
                                    <path id="pth_9795" data-name="pth 9795" d="M13540-64l8,8-8,8"
                                        transform="translate(-83.497 -49.496)" fill="none" stroke="#000"
                                        stroke-width="2">
                                    </path>
                                </g>
                            </svg>
                        </div>

                        <div class="mt-2">
                            <div class="d-flex gap-3">
                                <p class="fw-bold" type="button" data-search-term="Ngọc trai">Ngọc</p>
                                <p class="" type="button" data-search-term="Ngọc trai">Ngọc</p>
                                <p class="" type="button" data-search-term="Ngọc trai">Ngọc</p>
                                <p class="" type="button" data-search-term="Ngọc trai">Ngọc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="px-4">
            Result find (<strong>1</strong>)
        </div>
        <div class="px-4">
            <div class="d-flex gap-2">
                <p type="button" class="fw-bold">Lastest items</p>
                <p type="button">Oldest items</p>
                <p type="button">Low price</p>
                <p type="button">High price</p>
            </div>
        </div>
    </div>
    <hr class="mx-3">
    <div class="mb-3 px-4">
        <div class="border border-1 d-flex align-items-center" style="border-bottom: none !important;">
            <div class="p-2 fw-bold">Category</div>
            <div class="ms-4 d-flex">
                <span class="badge rounded-pill bg-secondary mx-2">Badge 1</span>
                <span class="mx-2">Badge 2</span>
                <span class="mx-2">Badge 3</span>
            </div>
        </div>
        <div class="border border-1 d-flex align-items-center">
            <div class="p-2 fw-bold">Price</div>
            <div class="ms-5 d-flex">
                <span class="badge rounded-pill bg-secondary mx-2">All price</span>
                <span class="mx-2">~ 500,000 đ</span>
                <span class="mx-2">~ 1,000,000 đ</span>
                <input value="0" type="number" min="0" class="border rounded-pill text-center ms-3"
                    name="min" style="background-color: rgb(233,233,233); width: 20%">
                <span class="mx-3"> - </span>
                <input value="0" type="number" min="0" class="border rounded-pill text-center"
                    name="max" style="background-color: rgb(233,233,233); width: 20%">
            </div>
        </div>
    </div>
    <div class="box-category" style="margin-top: 30px">
        <div class="box-product-category box-product-category-four" style="gap: 80px">
            @forelse ($products as $pro)
                <div class="item-product">
                    <img src="{{ asset('assets/images/Icon.png') }}" class="icon-cart-product" loading="lazy"
                        onclick="addAttributeCart({{ $pro->id }})">
                    @if ($pro->interest == 1)
                        <img src="{{ asset('assets/images/heart-solid.svg') }}" class="icon-heart-product"
                            data-product-id="{{ $pro->id }}" loading="lazy">
                    @else
                        <img src="{{ asset('assets/images/heart.png') }}" class="icon-heart-product"
                            data-product-id="{{ $pro->id }}" loading="lazy">
                    @endif
                    <img src="{{ $pro->thumbnail_img }}" class="w-100" loading="lazy">
                    <a href="{{ url('detail-product', $pro->id) }}">
                        <div class="box-info-sp">
                            <p class="title-product">{{ $pro->name }}</p>
                            @php
                                $discountEndTime = \Carbon\Carbon::parse($pro->discount_end);
                                $currentDateTime = \Carbon\Carbon::now();
                                $remainingTime = $discountEndTime->diff($currentDateTime)->format('%a days %H:%I:%S');
                            @endphp
                            @if ($pro->discount > 0 && $discountEndTime->isAfter($currentDateTime))
                                <p class="price">{{ number_format($pro->price, 0, '.', ',') }} đ</p>
                                @php
                                    if ($pro->discount_type == 'percent') {
                                        $salePrice = $pro->price - ($pro->price * $pro->discount) / 100;
                                    } else {
                                        $salePrice = $pro->price - $pro->discount;
                                    }
                                @endphp
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="box-item-price">
                                        <p class="price-sale">{{ number_format($salePrice, 0, '.', ',') }} đ</p>
                                        @if ($pro->discount_type == 'percent')
                                            <p class="percent-sale">{{ $pro->discount }}%</p>
                                        @else
                                            <p class="percent-sale">
                                                -{{ number_format($pro->discount, 0, '.', ',') }} đ</p>
                                        @endif
                                    </div>
                                    <div class="box-time-sp">
                                        <img src="{{ asset('assets/images/clock.png') }}" class="icon-clock">
                                        <p class="title-time">Time remaining: {{ $remainingTime }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="box-item-price">
                                        <p class="price-sale">{{ number_format($pro->price, 0, '.', ',') }} đ</p>
                                        <p class="percent-sale"></p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @empty
                <div class="w-100 d-flex justify-content-center mt-5 text-muted">
                    Not found related product
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{-- <div class="pagination" style="display: inline-block;">
                <div class="d-flex text-center justify-content-center align-items-center gap-2"
                    id="dalue_search_pagination">

                    <a style="top: 3px; position: relative;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                            <g transform="translate(-877.5 -600)">
                                <path d="M-19057.816-16469.5l-5,5,5,5" transform="translate(19961.816 17083)"
                                    fill="none" stroke="#000" stroke-width="1"></path>
                                <rect width="48" height="38" transform="translate(877.5 600)" fill="none">
                                </rect>
                            </g>
                        </svg></a>

                    <a class="fw-bold">1</a>

                    <a style="top: 3px; position: relative;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                            <g transform="translate(-540 -859)">
                                <path d="M-19062.814-16469.5l5,5-5,5" transform="translate(19624.314 17342)"
                                    fill="none" stroke="#000" stroke-width="1"></path>
                                <rect width="48" height="38" transform="translate(540 859)" fill="none">
                                </rect>
                            </g>
                        </svg></a>
                </div>
            </div> --}}
            <div class="pagination" style="display: inline-block;">
                <div class="d-flex text-center justify-content-center align-items-center gap-2"
                    id="dalue_search_pagination">
                    @if ($products->currentPage() > 1)
                        <a href="{{ $products->previousPageUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                                <g transform="translate(-877.5 -600)">
                                    <path d="M-19057.816-16469.5l-5,5,5,5" transform="translate(19961.816 17083)"
                                        fill="none" stroke="#000" stroke-width="1"></path>
                                    <rect width="48" height="38" transform="translate(877.5 600)" fill="none">
                                    </rect>
                                </g>
                            </svg>
                        </a>
                    @endif

                    @for ($page = 1; $page <= $products->lastPage(); $page++)
                        <a class="{{ $page == $products->currentPage() ? ' fw-bold' : '' }}"
                            href="{{ $products->url($page) }}">
                            {{ $page }}
                        </a>
                    @endfor

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                                <g transform="translate(-540 -859)">
                                    <path d="M-19062.814-16469.5l5,5-5,5" transform="translate(19624.314 17342)"
                                        fill="none" stroke="#000" stroke-width="1"></path>
                                    <rect width="48" height="38" transform="translate(540 859)" fill="none">
                                    </rect>
                                </g>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_page')
@endsection
