<div class="box-outstanding">
    <p class="title-outstanding">Highlight</p>
    <div class="swiper outstanding">
        <div class="swiper-wrapper">
            @foreach ($topCategories as $top_cate)
                <div class="swiper-slide content-menu-outstanding">
                    <p style="width: fit-content;"># {{ $top_cate->name }}</p>
                </div>
            @endforeach

        </div>
        <a href="#" class="link-view-all">View All</a>
    </div>
    <div thumbsSlider="" class="swiper contentOutstanding">
        <div class="swiper-wrapper">
            @foreach ($productsByCategory as $products)
                <div class="swiper-slide box-swiper-sp">
                    @foreach ($products as $pro)
                        <a href="{{ url('detail-product', $pro->id) }}" class="item-product">
                            <img src="{{ asset('assets/images/Icon.png') }}" class="icon-cart-product" loading="lazy"
                                onclick="addToCart({{ $pro->id }})">
                            @if ($pro->interest == 1)
                                <img src="{{ asset('assets/images/heart-solid.svg') }}" class="icon-heart-product"
                                    data-product-id="{{ $pro->id }}" loading="lazy">
                            @else
                                <img src="{{ asset('assets/images/heart.png') }}" class="icon-heart-product"
                                    data-product-id="{{ $pro->id }}" loading="lazy">
                            @endif
                            <img src="{{ $pro->thumbnail_img }}" class="w-100" loading="lazy">
                            <div>
                                <p class="title-product">{{ $pro->name }}</p>
                                @php
                                    $discountEndTime = \Carbon\Carbon::parse($pro->discount_end);
                                    $currentDateTime = \Carbon\Carbon::now();
                                    $remainingTime = $discountEndTime
                                        ->diff($currentDateTime)
                                        ->format('%a days %H:%I:%S');
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
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
