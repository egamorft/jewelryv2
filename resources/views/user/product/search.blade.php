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
            <form id="product-search-form" action="{{ route('search') }}" method="GET">
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
                                <input id="product-search-input" type="text" class="input-search-header" name="q"
                                    placeholder="Search your product" value="{{ request()->query('q') }}">
                            </div>
                            <svg id="btnSearchProduct" class="btnSearch" style="cursor: pointer"
                                xmlns="http://www.w3.org/2000/svg" width="21.413" height="17.414"
                                viewBox="0 0 21.413 17.414" index="0">
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
                                @foreach ($topSearches as $search)
                                    <p class="quickFilter {{ request()->query('q') == $search->query ? 'fw-bold' : '' }}"
                                        type="button" data-search-term="{{ $search->query }}">{{ $search->query }}</p>
                                @endforeach
                            </div>
                        </div>
                        <!-- Hidden input field for parameter -->
                        @foreach (request()->query() as $key => $value)
                            @if ($key !== 'q')
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="px-4">
            Result find (<strong>{{ $products->total() }}</strong>)
        </div>
        <div class="px-4">
            <div class="d-flex gap-2">
                <p class="quickOrderBy {{ !request()->query('orderBy') || request()->query('orderBy') == 'latest' ? 'fw-bold' : '' }}"
                    type="button" data-order-by="latest">Lastest items</p>
                <p class="quickOrderBy {{ request()->query('orderBy') == 'oldest' ? 'fw-bold' : '' }}" type="button"
                    data-order-by="oldest">Oldest items</p>
                <p class="quickOrderBy {{ request()->query('orderBy') == 'lowPrice' ? 'fw-bold' : '' }}" type="button"
                    data-order-by="lowPrice">Low price</p>
                <p class="quickOrderBy {{ request()->query('orderBy') == 'highPrice' ? 'fw-bold' : '' }}" type="button"
                    data-order-by="highPrice">High price</p>
            </div>
        </div>
    </div>
    <hr class="mx-3">
    <div class="mb-3 px-4">
        <div class="border border-1 d-flex align-items-center" style="border-bottom: none !important;">
            <div class="p-2 fw-bold">Category</div>
            <div class="ms-4 d-flex">
                <span
                    class="quickFilterCategory mx-2 {{ !request()->query('category') || request()->query('category') == 'all' ? 'badge rounded-pill bg-secondary' : '' }}"
                    type="button" data-category="all">All category</span>
                @foreach ($listCategory as $index => $cate)
                    @if ($index < 2)
                        <span
                            class="quickFilterCategory mx-2 {{ request()->query('category') == $cate->id ? 'badge rounded-pill bg-secondary' : '' }}"
                            type="button" data-category="{{ $cate->id }}">{{ $cate->name }}</span>
                    @endif

                    @if ($index >= 2)
                        <span class="quickFilterCategory mx-2 d-none d-md-inline-block">{{ $cate->name }}</span>
                    @endif
                @endforeach
            </div>
        </div>
        <form>
            <div class="border border-1 d-flex align-items-center">
                <div class="p-2 fw-bold">Price</div>
                <div class="ms-5 d-flex">
                    <span
                        class="quickFilterPrice mx-2 {{ !request()->query('maxPrice') || request()->query('maxPrice') == '' ? 'badge rounded-pill bg-secondary' : '' }}"
                        type="button" data-price="all">All price</span>
                    <span
                        class="quickFilterPrice mx-2  d-none d-md-inline-block {{ request()->query('maxPrice') == '500000' ? 'badge rounded-pill bg-secondary' : '' }}"
                        type="button" data-price="500000">~ 500,000 đ</span>
                    <span
                        class="quickFilterPrice mx-2  d-none d-md-inline-block {{ request()->query('maxPrice') == '1000000' ? 'badge rounded-pill bg-secondary' : '' }}"
                        type="button" data-price="1000000">~ 1,000,000 đ</span>
                    <input id="min-price-input" value="{{ request()->query('minPrice') ?? 0 }}" type="number"
                        min="0" class="border rounded-pill text-center ms-3" name="minPrice"
                        style="background-color: rgb(233,233,233); width: 20%">
                    <span class="mx-3"> - </span>
                    <input id="max-price-input" value="{{ request()->query('maxPrice') ?? 0 }}" type="number"
                        min="0" class="border rounded-pill text-center me-3" name="maxPrice"
                        style="background-color: rgb(233,233,233); width: 20%">
                    <svg type="button" id="search-price-btn" class="mt-1" xmlns="http://www.w3.org/2000/svg"
                        width="15" height="15" viewBox="0 0 20.707 20.556">
                        <g transform="translate(-3992 -55.624)">
                            <g transform="translate(3992 55.624)" fill="none" stroke="#000" stroke-miterlimit="10"
                                stroke-width="2">
                                <circle cx="8.024" cy="8.024" r="8.024" stroke="none"></circle>
                                <circle cx="8.024" cy="8.024" r="7.024" fill="none"></circle>
                            </g>
                            <line x2="6.231" y2="6.231" transform="translate(4005.77 69.243)" fill="none"
                                stroke="#000" stroke-miterlimit="10" stroke-width="2"></line>
                        </g>
                    </svg>
                </div>
            </div>
            <!-- Hidden input field for parameter -->
            @foreach (request()->query() as $key => $value)
                @if ($key !== 'maxPrice' && $key !== 'minPrice')
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
        </form>
    </div>
    <div class="box-category" style="margin-top: 30px">
        <div class="box-product-category box-product-category-four" style="gap: 80px">
            @forelse ($products as $pro)
                <div class="item-product">
                    <img src="{{ asset('assets/images/Icon.png') }}" class="icon-cart-product" loading="lazy" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" 
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
            <div class="pagination" style="display: inline-block;">
                <div class="d-flex text-center justify-content-center align-items-center gap-2"
                    id="dalue_search_pagination">
                    <a href="{{ $products->previousPageUrl() ?? '#' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                            <g transform="translate(-877.5 -600)">
                                <path d="M-19057.816-16469.5l-5,5,5,5" transform="translate(19961.816 17083)"
                                    fill="none" stroke="#000" stroke-width="1"></path>
                                <rect width="48" height="38" transform="translate(877.5 600)" fill="none">
                                </rect>
                            </g>
                        </svg>
                    </a>

                    @for ($page = 1; $page <= $products->lastPage(); $page++)
                        <a class="{{ $page == $products->currentPage() ? ' fw-bold' : '' }}"
                            href="{{ $products->url($page) }}">
                            {{ $page }}
                        </a>
                    @endfor

                    <a href="{{ $products->nextPageUrl() ?? '#' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                            <g transform="translate(-540 -859)">
                                <path d="M-19062.814-16469.5l5,5-5,5" transform="translate(19624.314 17342)"
                                    fill="none" stroke="#000" stroke-width="1"></path>
                                <rect width="48" height="38" transform="translate(540 859)" fill="none">
                                </rect>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_page')
    <script>
        // Search bar
        $(document).ready(function() {
            // Click event handler for search buttons
            $('.quickFilter').click(function() {
                // Get the data-search-term attribute value
                var searchTerm = $(this).data('search-term');

                // Set the value of the search input field
                $('#product-search-input').val(searchTerm);

                // Submit the form
                $('#product-search-form').submit();
            });

            // Click event handler for the btnSearch button
            $('#btnSearchProduct').click(function() {
                $('#product-search-form').submit();
            });

        });
    </script>

    <script>
        //Order by
        $(document).ready(function() {
            // Click event handler for filter buttons
            $('.quickOrderBy').click(function() {
                // Get the data-orderBy attribute value
                var orderBy = $(this).data('order-by');

                // Update the URL with the orderBy query parameter
                var url = new URL(window.location.href);
                url.searchParams.set('orderBy', orderBy);

                // Navigate to the updated URL
                window.location.href = url.toString();
            });
        });
    </script>

    <script>
        //Category
        $(document).ready(function() {
            // Click event handler for filter buttons
            $('.quickFilterCategory').click(function() {
                // Get the data-category attribute value
                var category = $(this).data('category');

                // Update the URL with the category query parameter
                var url = new URL(window.location.href);
                url.searchParams.set('category', category);

                // Navigate to the updated URL
                window.location.href = url.toString();
            });
        });
    </script>

    <script>
        // Search price
        $(document).ready(function() {
            // Click event handler for search buttons
            $('.quickFilterPrice').click(function() {
                // Get the data-price attribute value
                var price = $(this).data('price');

                if (price == 'all') {
                    $('#min-price-input').val(0);
                    $('#max-price-input').val(0);
                }

                // Set the value of the search input field
                $('#max-price-input').val(price);

                // Submit the form
                var parentForm = $(this).closest('form');
                parentForm.submit();
            });

            // Click event handler for the btnSearch button
            $('#search-price-btn').click(function() {
                var parentForm = $(this).closest('form');
                parentForm.submit();
            });

        });
    </script>

@endsection
