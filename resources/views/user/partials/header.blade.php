<div class="box-header">
    <div class="d-flex align-item-center">
        <div class="item-text-header" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuTop"
            aria-controls="offcanvasMenuTop">SHOP
        </div>
        <a href="{{ route('styling') }}" class="item-text-header">STYLING</a>
        <a href="{{ route('live') }}" class="item-text-header">LIVE</a>
        <a class="item-text-header">HANNAM SHOWROOM</a>
    </div>
    <a href="{{ route('home') }}">
        <img src="{{ asset('assets/images/jewelry.png') }}" class="img-logo">
    </a>
    <div class="d-flex align-item-center">
        <a href="#">
            <img src="{{ asset('assets/images/search-sm.png') }}" class="icon-header" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSearchTop" aria-controls="offcanvasSearchTop">
        </a>
        <a href="{{ Auth::check() ? route('profile.interest') : route('auth.member.login') }}">
            <img src="{{ asset('assets/images/heart.png') }}" class="icon-header">
        </a>
        <a href="{{ Auth::check() ? route('profile.index') : route('auth.member.login') }}">
            <img src="{{ asset('assets/images/user-03.png') }}" class="icon-header">
        </a>

        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
            <div class="position-relative">
                <img src="{{ asset('assets/images/Icon.png') }}" class="icon-header">
                <div class="point-cart">0</div>
            </div>
        </a>

    </div>
</div>

<div class="box-header-mobile">
    <img src="{{ asset('assets/images/jewelry.png') }}" class="img-logo">
    <div class="d-flex align-item-center">
        <img src="{{ asset('assets/images/search-sm.png') }}" class="icon-header" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasSearchTop" aria-controls="offcanvasSearchTop">
            <a href="{{ Auth::check() ? route('profile.interest') : route('auth.member.login') }}">
                <img src="{{ asset('assets/images/user-03.png') }}" class="icon-header">
            </a>
        <div class="position-relative">
            <img src="{{ asset('assets/images/Icon.png') }}" class="icon-header">
            <div class="point-cart">0</div>
        </div>

    </div>
</div>

<!-- search -->
<div class="offcanvas offcanvas-search-top" tabindex="-1" id="offcanvasSearchTop"
    aria-labelledby="offcanvasSearchTopLabel">
    <button type="button" class="btn-close btn-close-search" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body offcanvas-body-header-search">
        <form id="search-form" action="{{ route('search') }}" method="GET">
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
                                <line x2="6.231" y2="6.231" transform="translate(4005.77 69.243)" fill="none"
                                    stroke="#000" stroke-miterlimit="10" stroke-width="2"></line>
                            </g>
                        </svg>
                        <input id="search-input" type="text" class="input-search-header" name="q">
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

                <div class="content-header-search">
                    <p class="title-popular">Tìm kiếm phổ biến</p>
                    <div class="box-popular">
                        @foreach ($topSearches as $key => $search)
                            <p class="item-popular" type="button" data-search-term="{{ $search->query }}">{{ $key + 1 }}. {{ $search->query }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- menu -->
<div class="offcanvas offcanvas-menu-top" tabindex="-1" id="offcanvasMenuTop"
    aria-labelledby="offcanvasMenuTopLabel">
    <div class="offcanvas-body box-menu-header">
        @if (isset($parentCategories) && !$parentCategories->isEmpty())
            <div class="col-item-menu">
                @foreach ($parentCategories as $cate)
                    <a href="javascript:void(0)" onclick="toggleChildCategories({{ $cate->id }})"
                        class="text-item-menu">{{ strtoupper($cate->name) }}</a>
                @endforeach
                <a href="{{ route('categories.show', ['slug' => 'all']) }}" class="text-item-menu">VIEW ALL</a>
            </div>
        @endif
        @if (isset($childrenCategories) && !empty($childrenCategories))
            @php
                $index = 0;
            @endphp
            @foreach ($childrenCategories as $parentId => $children)
                <div id="childCategories_{{ $parentId }}" style="{{ $index == 0 ? '' : 'display: none;' }}"
                    class="col-item-menu">
                    @if (!empty($children))
                        @foreach ($children as $child)
                            <a href="{{ route('categories.show', ['slug' => $child['slug']]) }}"
                                class="content-item-menu">{{ strtoupper($child['name']) }}</a>
                        @endforeach
                        <a href="{{ route('categories.show', ['slug' => $children[0]['parent_slug']]) }}"
                            class="content-item-menu">VIEW ALL</a>
                    @endif
                </div>
                @php
                    $index++;
                @endphp
            @endforeach
        @endif
        <div class="col-item-menu-right">
            <a href="#" class="content-item-menu">HERITAGE LINE</a>
            <a href="#" class="content-item-menu">EVERYDAY LINE</a>
            <a href="#" class="content-item-menu">NEW in</a>
        </div>

        {{-- Category thumbnail --}}
        @if (isset($parentCategories) && !$parentCategories->isEmpty())
            @foreach ($parentCategories as $key => $cate)
                <div id="category_thumbnail_{{ $cate->id }}" class="col-item-menu-right categoryThumbnail"
                    style="{{ $key == 0 ? '' : 'display: none' }}">
                    <img src="{{ $cate->thumbnail }}" class="w-100">
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCartLabel">Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group mb-3" id="cartUl">
        </ul>
        <div class="mt-auto">
            <hr>
            <p class="mb-0 fs-5">Subtotal: <span id="cartSubTotal">$59.98</span></p>
            <a href="{{ route('checkout') }}" class="btn btn-outline-dark mt-3">Checkout</a>
        </div>
    </div>
</div>
