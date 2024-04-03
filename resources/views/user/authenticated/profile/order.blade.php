@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="title-area myshop-common">
            <span class="mobile-only go-back"></span>
            <h2>Order details</h2>
        </div>

        <div class="xans-element- xans-myshop xans-myshop-orderhistorytab drmvsn-base-tab ">
            <ul class="flex align-center justify-center">
                <li class="tab_class selected"><a href="#">Order details
                        (<span id="xans_myshop_total_orders">0</span>)</a></li>
                <li class="tab_class_cs"><a href="#">Cancellation/Return/Exchange
                        history (<span id="xans_myshop_total_orders_cs">0</span>)</a></li>
                <li class="tab_class_old displaynone"><a href="#">Previous order history
                        (<span id="xans_myshop_total_orders_old">0</span>)</a></li>
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
                                        <a href="#" class="btn prior-2 width-full justify-center"
                                            days="00">today</a>
                                        <a href="#" class="btn prior-2 width-full justify-center" days="07">1
                                            week</a>
                                        <a href="#" class="btn prior-2 width-full justify-center" days="30">1
                                            month</a>
                                        <a href="#" class="btn prior-2 width-full justify-center" days="90">3
                                            months</a>
                                        <a href="#" class="btn prior-2 width-full justify-center" days="180">6
                                            months</a>
                                    </span>
                                </div>
                                <div class="flex period-select-box">
                                    <div class="dv-field month-select-wrap">
                                        <div class="dv-control flex align-center justify-start"><input
                                                id="history_start_date" name="history_start_date"
                                                class="fText hasDatepicker" readonly="readonly" size="10"
                                                value="2024-01-04" type="text"><button type="button"
                                                class="ui-datepicker-trigger"><img
                                                    src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/ico_cal.gif"
                                                    alt="..." title="..."></button><span
                                                class="mx-5">-</span><input id="history_end_date" name="history_end_date"
                                                class="fText hasDatepicker" readonly="readonly" size="10"
                                                value="2024-04-03" type="text"><button type="button"
                                                class="ui-datepicker-trigger"><img
                                                    src="//img.echosting.cafe24.com/skin/admin_ko_KR/myshop/ico_cal.gif"
                                                    alt="..." title="..."></button></div>
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
                <div class="order-state-box status-side mt-10">
                    <div class="stateSelect select width-full "><select id="order_status" name="order_status"
                            class="fSelect">
                            <option value="all">Total order processing status</option>
                            <option value="shipped_before">Before deposit</option>
                            <option value="shipped_standby">Preparing for delivery</option>
                            <option value="shipped_begin">Shipping</option>
                            <option value="shipped_complate">Delivery completed</option>
                            <option value="order_cancel">Cancellation</option>
                            <option value="order_exchange">Exchange</option>
                            <option value="order_return">Return</option>
                        </select></div>
                </div>
            </div>
        </form>
        <div class="xans-element- xans-myshop xans-myshop-orderhistorylistitem mt-20">
            <div class="title displaynone">
                <h3>Order product information</h3>
            </div>
            <div class="new-order-list displaynone">
                <div data-="" class="order-block order-message-block bundle-displaynone ">
                    <div class="number displaynone">
                        <div class="flex">
                            <div class="order-icon"></div>
                            <div class="order-date"></div>
                            <div class="ml-auto order-id"><a href="#" class="line">Order Number []</a></div>
                        </div>
                    </div>
                    <div class="status-and-shipping flex align-center justify-between mt-20">
                        <div class="order-status font-bold"></div>

                        <div class="shipping-box flex align-center">
                            <p class="displaynone"><a href="#" target=""></a></p>
                            <p class="displaynone"><a href="#" class="line" onclick="">[]</a></p>
                        </div>
                    </div>
                    <div class="flex justify-between align-start mt-10">
                        <div class="left-info">
                            <div class="product-text-information-and-thumbnail">
                                <div class="flex justify-between">
                                    <div class="product-information">
                                        <div class="name">
                                            <a href="#"> </a>
                                        </div>
                                        <div class="option mt-10 displaynone"></div>
                                        <ul class="xans-element- xans-myshop xans-myshop-optionset option mt-10">
                                            <li class="">
                                                <strong></strong> (piece)
                                            </li>
                                        </ul>
                                        <p class="gBlank5 displaynone">Interest-free installment product</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-qty-and-price flex align-center font-bold mt-10">
                                <div class="qty mr-5">piece</div>
                                <div class="price">
                                    <strong></strong>
                                    <div class="displaynone"></div>
                                </div>
                            </div>
                            <div class="product-status-and-actions mt-20 flex gap-10">
                                <a href="#"
                                    class="btn prior-2 is-padded displaynone crema-new-review-link crema-applied"
                                    data-cafe24-product-link="" data-install-method="hardcoded"
                                    data-applied-widgets="[&quot;.crema-new-review-link&quot;]">Purchase Review</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Cancel Withdrawal</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Exchange withdrawal</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Withdrawal of return</a>
                            </div>
                            <div class="product-rce mt-10 flex gap-10">
                                <p class="inline-flex displaynone"><a href="#none" class="btn prior-2 is-padded">More
                                        information</a></p>
                                <p class="displaynone displaynone">-</p>

                                <a href="#" class="btn prior-2 is-padded displaynone" onclick="">Withdraw
                                    order</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Cancellation request</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Exchange request</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Return request</a>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="#" class="font-size-0">
                                <img class="width-130" src="//img.echosting.cafe24.com/thumb/img_product_small.gif"
                                    alt="">
                                &nbsp;</a>
                        </div>
                    </div>
                </div>
                <div data-="" class="order-block order-message-block bundle-displaynone ">
                    <div class="number displaynone">
                        <div class="flex">
                            <div class="order-icon"></div>
                            <div class="order-date"></div>
                            <div class="ml-auto order-id"><a href="#" class="line">Order Number []</a></div>
                        </div>
                    </div>
                    <div class="status-and-shipping flex align-center justify-between mt-20">
                        <div class="order-status font-bold"></div>

                        <div class="shipping-box flex align-center">
                            <p class="displaynone"><a href="#" target=""></a></p>
                            <p class="displaynone"><a href="#" class="line" onclick="">[]</a></p>
                        </div>
                    </div>
                    <div class="flex justify-between align-start mt-10">
                        <div class="left-info">
                            <div class="product-text-information-and-thumbnail">
                                <div class="flex justify-between">
                                    <div class="product-information">
                                        <div class="name">
                                            <a href="#"> </a>
                                        </div>
                                        <div class="option mt-10 displaynone"></div>
                                        <ul class="xans-element- xans-myshop xans-myshop-optionset option mt-10">
                                            <li class="">
                                                <strong></strong> (piece)
                                            </li>
                                        </ul>
                                        <p class="gBlank5 displaynone">Interest-free installment product</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-qty-and-price flex align-center font-bold mt-10">
                                <div class="qty mr-5">piece</div>
                                <div class="price">
                                    <strong></strong>
                                    <div class="displaynone"></div>
                                </div>
                            </div>
                            <div class="product-status-and-actions mt-20 flex gap-10">
                                <a href="#"
                                    class="btn prior-2 is-padded displaynone crema-new-review-link crema-applied"
                                    data-cafe24-product-link="" data-install-method="hardcoded"
                                    data-applied-widgets="[&quot;.crema-new-review-link&quot;]">Purchase Review</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Cancel
                                    Withdrawal</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Exchange
                                    withdrawal</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Withdrawal of
                                    return</a>
                            </div>
                            <div class="product-rce mt-10 flex gap-10">
                                <p class="inline-flex displaynone"><a href="#" class="btn prior-2 is-padded">More
                                        information</a></p>
                                <p class="displaynone displaynone">-</p>

                                <a href="#" class="btn prior-2 is-padded displaynone">Withdraw
                                    order</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Cancellation request</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Exchange request</a>
                                <a href="#" class="btn prior-2 is-padded displaynone">Return request</a>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="#" class="font-size-0">
                                <img class="width-130" src="//img.echosting.cafe24.com/thumb/img_product_small.gif"
                                    onerror="this.src='//img.echosting.cafe24.com/thumb/img_product_small.gif';"
                                    alt="">
                                &nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="is-no-data ">There is no order history.</p>
        </div>

        <div class="xans-element- xans-myshop xans-myshop-orderhistorypaging ec-base-paginate"><!--order history-->
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
        </div>

        <form method="GET" id="OrderHistoryForm" name="OrderHistoryForm">
            <div class="xans-element- xans-myshop xans-myshop-orderhistoryhead is-help with-border ">
                <ul>
                    <li class="disc-li">Cancellation/exchange/return requests can be made up to 1 day from the order
                        completion date..</li>
                    <li class="disc-li">By default, data for the last 3 months is displayed, and when searching by period,
                        you can view past order history.</li>
                    <li class="disc-li">Click on the order number to see details about the order.</li>
                </ul>
            </div>
            <input id="mode" name="mode" value="" type="hidden">
            <input id="term" name="term" value="" type="hidden">
        </form>
    </div>
@endsection
