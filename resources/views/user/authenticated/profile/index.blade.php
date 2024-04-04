@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="xans-element- xans-order xans-order-dcinfo mobile-only ">
            <div class="flex align-center justify-between">
                <div class="customer-name font-bold">{{ strtoupper(Auth::user()->name) }}</div>
                <div class="group-name flex align-center font-bold">
                    [Silver]
                    <span class="group-notice displaynone line-height-0 ml-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path data-name="Icon ionic-md-information-circle"
                                d="M10.375,3.375a7,7,0,1,0,7,7A7,7,0,0,0,10.375,3.375Zm.707,10.5H9.668V9.668h1.413Zm0-5.587H9.668V6.875h1.413Z"
                                transform="translate(-3.375 -3.375)"></path>
                        </svg></span>
                </div>
            </div>
        </div>
        <div class="xans-element- xans-order xans-order-dcinfo myshop-index-top py-20 px-40 m-px-20">
            <div class="ec-base-box typeMember gMessage ">
                <div class="information flex">
                    <div class="thumbnail mr-40 text-center ">
                        <img src="//www.dona-d.com/web/upload/mg_img_SV1.png" alt=""
                            onerror="this.src='//img.echosting.cafe24.com/skin/base/member/img_member_default.gif';"
                            class="width-60 loaded">
                        <div class="mt-10 font-bold">[Silver]</div>
                    </div>
                    <div class="description ">
                        <div class="user-info mb-20">
                            <span class="font-bold">{{ strtoupper(Auth::user()->name) }}</span> is a
                            <span class="font-bold">[Silver]</span> member.
                        </div>

                        <div class="">
                            {{-- <p class="displaynone myshop_benefit_display_no_benefit"><strong><span
                                        class="myshop_benefit_dc_pay"></span> <span class="myshop_benefit_dc_min_price">0
                                        won or
                                        more</span></strong>
                                Upon purchase
                                <strong><span class="myshop_benefit_dc_price">0 won</span><span
                                        class="myshop_benefit_dc_type"></span></strong>second <span
                                    class="myshop_benefit_use_dc">No additional discount</span> You can
                                receive it. <span class="myshop_benefit_dc_max_percent"></span>
                            </p>
                            <p class="displaynone myshop_benefit_display_with_all"><strong><span
                                        class="myshop_benefit_dc_pay"></span> <span
                                        class="myshop_benefit_dc_min_price_mileage">0 won
                                        이상</span></strong> Upon purchase <strong><span
                                        class="myshop_benefit_dc_price_mileage">0 won</span><span
                                        class="myshop_benefit_dc_type_mileage"></span></strong>second
                                <span class="myshop_benefit_use_dc_mileage"></span> You can receive it.
                                <span class="myshop_benefit_dc_max_mileage_percent"></span>
                            </p> --}}
                            <div class=" gBlank5" id="sGradeAutoDisplayArea">
                                <p class=" sAutoGradeDisplay ">
                                    <strong> [<span class="sNextGroupIconArea"></span><span
                                            class="xans-member-var-sNextGrade">Gold</span>] </strong>
                                    The remaining purchase amount is <strong><span
                                            class="xans-member-var-sGradeIncreasePrice">500,000
                                            won</span></strong>
                                    no see. (recentfor <span class="xans-member-var-sGradePeriod">12 months</span>
                                    Purchase amount : <span class="xans-member-var-sPeriodOrderPrice">0
                                        won</span>)
                                </p>
                                <p class="mt-20">This is an estimate based on upgrade criteria and may differ from the total order amount.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level-benefit displaynone"><a href="#">View benefits by
                            level</a></div>

                    <div class="membership-benefits displaynone">
                        <div class="order-history-3m">
                            <div class="text">recent 3month during</div>
                            <div class="benefit-box">
                                Purchase amount : <span class="value"></span> ｜Number of purchases :
                                <span class="value"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invite ec-base-box typeThinBg gMerge displaynone">
                <strong class="txtEm">Copy the address and invite your friends to the shopping
                    mall.</strong>
                <div class="dv-field has-addons">
                    <div class="dv-control"><input type="text" class="input" id="" value="///?reco_id="
                            readonly=""></div>
                    <div class="dv-control">
                        <a href="#" class="btn prior-1" onclick="">Copy address</a>
                    </div>
                </div>

                <ul>
                    <li>- Friends will receive Reserves immediately after signing up.</li>
                    <li>- </li>
                </ul>
            </div>
        </div>

        <div class="drmvsn-myshop-title mb-30 mobile-title">
            <h2>Recent Order Status</h2>
        </div>

        <div class="xans-element- xans-layout xans-layout-logincheck ">
        </div>

        <div class="xans-element- xans-myshop xans-myshop-orderstate ">
            <div class="inner">
                <ul class="order-state-list flex align-center">
                    <li class="state-item">
                        <div class="title">Before deposit</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_before_count">0</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Preparing for delivery</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_standby_count">0</span></a>
                        </div>
                    </li>
                    <li class="state-item">
                        <div class="title">Shipping</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_begin_count">0</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Delivery completed</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_complate_count">0</span></a>
                        </div>
                    </li>
                </ul>
                <ul class="change-state-list flex align-center justify-left mt-30">
                    <li class="state-item">
                        <div class="title">Cancellation</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_cancel_count">0</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Exchange</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_exchange_count">0</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Return</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_return_count">0</span></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
