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
                        (<span id="xans_myshop_total_orders">0</span>)</a>
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
                                            <input style="min-width: 120px" id="start_date" class="fText"
                                                value="2024-01-04" type="text">
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
                                            <input style="min-width: 120px" id="end_date" class="fText" value="2024-04-03"
                                                type="text">
                                            <button type="button" class="ui-datepicker-trigger"><img
                                                    src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/ico_cal.gif"></button>
                                        </div>
                                    </div>
                                    <span class="order-search-btn">
                                        <input alt="check" id="order_search_btn" type="image"
                                            src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/btn_search.gif"> <a
                                            href="#" class="btn prior-1 justify-center">Check</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="order-state-box status-side mt-10" id="order_status_div">
                    <div class="stateSelect select width-full">
                        <select id="order_status" name="order_status" class="fSelect">
                            <option value="all">Total order processing status</option>
                            <option value="shipped_before">Before deposit</option>
                            <option value="shipped_standby">Preparing for delivery</option>
                            <option value="shipped_begin">Shipping</option>
                            <option value="shipped_complate">Delivery completed</option>
                            <option value="order_cancel">Cancellation</option>
                            <option value="order_exchange">Exchange</option>
                            <option value="order_return">Return</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="xans-element- xans-myshop xans-myshop-orderhistorylistitem mt-20">
            <p class="is-no-data ">There is no order history.</p>
        </div>

        {{-- <div class="xans-element- xans-myshop xans-myshop-orderhistorypaging ec-base-paginate"><!--order history-->
            <div class="flex justify-center align-center">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                        <g transform="translate(-877.5 -600)">
                            <path d="M-19057.816-16469.5l-5,5,5,5" transform="translate(19961.816 17083)" fill="none"
                                stroke="#000" stroke-width="1"></path>
                            <rect width="48" height="38" transform="translate(877.5 600)" fill="none"></rect>
                        </g>
                    </svg></a>
                <ol class="flex justify-center align-center">
                    <li class="xans-record-"><a href="#" class="this">1</a></li>
                </ol>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" viewBox="0 0 48 38">
                        <g transform="translate(-540 -859)">
                            <path d="M-19062.814-16469.5l5,5-5,5" transform="translate(19624.314 17342)" fill="none"
                                stroke="#000" stroke-width="1"></path>
                            <rect width="48" height="38" transform="translate(540 859)" fill="none"></rect>
                        </g>
                    </svg></a>
            </div>
        </div> --}}
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
                var queryParameters = "startdate=" + startDate + "&enddate=" + endDate;
                var orderStatus = $('#order_status').val();
                if ($("#historyStatusTabBtn").parent("li").hasClass("selected")) {
                    window.location.href = url + "?" + queryParameters;
                } else {
                    window.location.href = url + "?status=" + orderStatus + "&" + queryParameters;
                }
            });
        });
    </script>
@endsection
