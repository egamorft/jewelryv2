@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="xans-element- xans-order xans-order-dcinfo mobile-only ">
            <div class="flex align-center justify-between">
                <div class="customer-name font-bold">{{ strtoupper(Auth::user()->name) }}</div>
                <div class="group-name flex align-center font-bold">
                    [Silver]
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
                            <span
                                class="font-bold">{{ strtoupper(Auth::user()->first_name . ' ' . Auth::user()->last_name) }}</span>
                            is a
                            <span class="font-bold">[Silver]</span> member.
                        </div>

                        <div class="">
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
                                <p class="mt-20">This is an estimate based on upgrade criteria and may differ from the
                                    total order amount.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    id="xans_myshop_orderstate_shppied_before_count">{{ $countBeforeDeposit }}</span></a>
                        </div>
                    </li>
                    <li class="state-item">
                        <div class="title">Preparing for delivery</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_standby_count">{{ $countPrepareDelivery }}</span></a>
                        </div>
                    </li>
                    <li class="state-item">
                        <div class="title">Shipping</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_begin_count">{{ $countShipping }}</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Delivery completed</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_shppied_complate_count">{{ $countCompleted }}</span></a>
                        </div>
                    </li>
                </ul>
                <ul class="change-state-list flex align-center justify-left mt-30">
                    <li class="state-item">
                        <div class="title">Cancellation</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_cancel_count">{{ $countCancel }}</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Exchange</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_exchange_count">{{ $countExchange }}</span></a></div>
                    </li>
                    <li class="state-item">
                        <div class="title">Return</div>
                        <div class="data"><a href="#"><span
                                    id="xans_myshop_orderstate_order_return_count">{{ $countReturn }}</span></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
