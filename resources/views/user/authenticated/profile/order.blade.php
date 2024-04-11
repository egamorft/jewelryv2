@extends('user.authenticated.profile.layouts.profile')

@section('pages_style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="title-area myshop-common">
            <span class="mobile-only go-back"></span>
            <h2>Order details</h2>
        </div>

        <div class="xans-element- xans-myshop xans-myshop-orderhistorytab drmvsn-base-tab ">
            <ul class="flex align-center justify-center">
                <li class="tab_class selected">
                    <a type="button" class="tabBtn" id="orderDetaiTabBtn">Order details
                        (<span id="xans_myshop_total_orders">{{ count($orders) }}</span>)</a>
                </li>
                <li class="tab_class">
                    <a type="button" class="tabBtn" id="historyStatusTabBtn">Cancellation/Return/Exchange
                        history (<span id="xans_myshop_total_orders_cs">0</span>)</a>
                </li>
            </ul>
        </div>

        <form method="GET" id="OrderHistoryForm" name="OrderHistoryForm">
            <div class="xans-element- xans-myshop xans-myshop-orderhistoryhead mt-20 ">
                <fieldset class="ec-base-box">
                    <legend>Set search period</legend>
                    <div class="flex justify-between align-center flex-wrap">
                        <div class="order-state-box period-side flex align-center width-full">
                            <div class="flex align-center width-full period-wrap">
                                <div class="flex align-center width-full mr-10 period-btn-wrap">
                                    <span class="period flex align-center width-full gap-10">
                                        <a type="button" class="btn prior-2 width-full justify-center quickFilterBtn"
                                            days="00">today</a>
                                        <a type="button" class="btn prior-2 width-full justify-center quickFilterBtn"
                                            days="07">1
                                            week</a>
                                        <a type="button" class="btn prior-2 width-full justify-center quickFilterBtn"
                                            days="30">1
                                            month</a>
                                        <a type="button" class="btn prior-2 width-full justify-center quickFilterBtn"
                                            days="90">3
                                            months</a>
                                        <a type="button" class="btn prior-2 width-full justify-center quickFilterBtn"
                                            days="180">6
                                            months</a>
                                    </span>
                                </div>
                                <div class="flex period-select-box">
                                    <div class="dv-field month-select-wrap me-3">
                                        <div class="dv-control flex align-center justify-start">
                                            <input style="min-width: 120px" name="start_date" id="start_date" class="fText"
                                                type="text"
                                                value="{{ request()->query('start_date') ?? date('Y-m-d') }}">
                                            <button type="button" class="ui-datepicker-trigger"><img
                                                    src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/ico_cal.gif"
                                                    alt="..." title="..."></button>
                                            <span class="mx-2">
                                                <svg width="18" height="2" viewBox="0 0 18 2" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1H17" stroke="black" stroke-width="2"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </span>
                                            <input style="min-width: 120px" name="end_date" id="end_date" class="fText"
                                                type="text" value="{{ request()->query('end_date') ?? date('Y-m-d') }}">
                                            <button type="button" class="ui-datepicker-trigger"><img
                                                    src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/ico_cal.gif"></button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn prior-1 justify-center">Check</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="order-state-box status-side mt-10" id="order_status_div">
                    <div class="stateSelect select width-full">
                        <select id="order_status" name="status" class="fSelect">
                            <option value="all" selected>Total order processing status</option>
                            <option value="{{ \App\Enums\OrderStatus::BEFORE_DEPOSIT }}"
                                {{ request()->query('status') != null && request()->query('status') == \App\Enums\OrderStatus::BEFORE_DEPOSIT ? 'selected' : '' }}>
                                Before deposit</option>
                            <option value="{{ \App\Enums\OrderStatus::PREPARE_DELIVERY }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::PREPARE_DELIVERY ? 'selected' : '' }}>
                                Preparing for delivery</option>
                            <option value="{{ \App\Enums\OrderStatus::SHIPPING }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::SHIPPING ? 'selected' : '' }}>
                                Shipping</option>
                            <option value="{{ \App\Enums\OrderStatus::COMPLETED }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::COMPLETED ? 'selected' : '' }}>
                                Delivery completed</option>
                            <option value="{{ \App\Enums\OrderStatus::CANCEL }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::CANCEL ? 'selected' : '' }}>
                                Cancellation</option>
                            <option value="{{ \App\Enums\OrderStatus::EXCHANGE }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::EXCHANGE ? 'selected' : '' }}>
                                Exchange</option>
                            <option value="{{ \App\Enums\OrderStatus::RETURN }}"
                                {{ request()->query('status') == \App\Enums\OrderStatus::RETURN ? 'selected' : '' }}>
                                Return</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        @forelse ($orders as $order)
            <div class="xans-element- xans-myshop xans-myshop-orderhistorylistitem mt-20">
                <div class="orderContainer" style="border: 1px solid">
                    @php
                        switch ($order->status) {
                            case \App\Enums\OrderStatus::BEFORE_DEPOSIT:
                                $badge = 'secondary';
                                break;
                            case \App\Enums\OrderStatus::PREPARE_DELIVERY:
                                $badge = 'primary';
                                break;
                            case \App\Enums\OrderStatus::SHIPPING:
                                $badge = 'info text-dark';
                                break;
                            case \App\Enums\OrderStatus::COMPLETED:
                                $badge = 'success';
                                break;
                            case \App\Enums\OrderStatus::CANCEL:
                                $badge = 'danger';
                                break;
                            case \App\Enums\OrderStatus::EXCHANGE:
                                $badge = 'warning text-dark';
                                break;
                            case \App\Enums\OrderStatus::RETURN:
                                $badge = 'dark';
                                break;
                            default:
                                $badge = 'secondary';
                                break;
                        }
                    @endphp
                    <div class="d-flex justify-content-between mb-3 fs-6 fw-bolder">
                        <div class="p-2">
                            Order date: {{ date('d/m/Y H:i', strtotime($order->created_at)) }}
                        </div>
                        <div class="p-2">
                            Order code: {{ $order->tracking_code }}
                        </div>
                        <div class="p-2">
                            <span
                                class="badge rounded-pill bg-{{ $badge }}">{{ \App\Enums\OrderStatus::getKey($order->status) }}</span>
                        </div>
                    </div>
                    @foreach ($order->orderDetails as $key => $detail)
                        <div class="container mb-2 {{ $key != 0 ? 'more-content' : '' }}"
                            style="{{ $key != 0 ? 'display: none;' : '' }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>{{ $detail->products->name }}</p>
                                    <img src="{{ $detail->products->thumbnail_img }}" class="img-thumbnail mt-2" alt=""
                                        width="160px">
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <p>Quantity: {{ $detail->quantity }}</p>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end">
                                    <p>{{ number_format($detail->price * $detail->quantity, 0, '.', ',') }} đ</p>
                                </div>
                            </div>
                        </div>
                        <hr class="mx-2">
                    @endforeach
                    @if (count($order->orderDetails) > 1)
                        <div class="d-flex justify-content-center">
                            <a type="button" class="show-more text-muted">Show more
                                <span class="fa fa-angle-down"></span></a>
                        </div>
                        <hr class="mx-2">
                    @endif
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Product amount: {{ count($order->orderDetails) }}</p>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                <p>Total: {{ number_format($order->total, 0, '.', ',') }} đ</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="container mb-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn prior-1 justify-center">Review order</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="xans-element- xans-myshop xans-myshop-orderhistorylistitem mt-20">
                <p class="is-no-data ">There is no order history.</p>
            </div>
        @endforelse
    </div>
@endsection

@section('pages_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            // Get today's date
            var today = new Date();

            $("#start_date").datepicker({
                maxDate: today, // Restrict date selection to today or earlier
                dateFormat: 'yy-mm-dd', // Set the date format as YYYY-MM-DD
                position: 'bottom', // Set the position to bottom
            });

            $("#end_date").datepicker({
                maxDate: today, // Restrict date selection to today or earlier
                dateFormat: 'yy-mm-dd', // Set the date format as YYYY-MM-DD
                position: 'bottom', // Set the position to bottom
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Change tab
            $(".tabBtn").click(function() {
                $("li.tab_class").removeClass("selected");
                $(this).parent("li").addClass("selected");

                var orderStatusDiv = $("#order_status_div");
                orderStatusDiv.toggleClass("d-none", !$(this).is("#orderDetaiTabBtn"));
            });

            // Quick filter button
            $(".quickFilterBtn").click(function(e) {
                e.preventDefault();

                // Get the selected days value
                var days = $(this).attr("days");

                // Calculate the start and end dates based on the selected days
                var startDate = moment().subtract(days, "days").format("YYYY-MM-DD");
                var endDate = moment().format("YYYY-MM-DD");

                // Update the URL with the start and end dates as query parameters
                var url = window.location.href.split("?")[0];
                var queryParameters = "start_date=" + startDate + "&end_date=" + endDate;
                var orderStatus = $('#order_status').val();
                if ($("#historyStatusTabBtn").parent("li").hasClass("selected")) {
                    window.location.href = url + "?" + queryParameters;
                } else {
                    window.location.href = url + "?status=" + orderStatus + "&" + queryParameters;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.show-more').on('click', function() {
                var showMoreBtn = $(this);
                var moreContent = showMoreBtn.closest('.orderContainer').find('.more-content');

                if (moreContent.is(':hidden')) {
                    moreContent.slideDown('fast');
                    showMoreBtn.find('span').removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    moreContent.slideUp('fast');
                    showMoreBtn.find('span').removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            });
        });
    </script>
@endsection
