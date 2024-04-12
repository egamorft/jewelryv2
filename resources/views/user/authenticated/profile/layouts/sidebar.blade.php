<div id="drmvsn-basic-sidebar">
    <aside id="myshop-sidebar" class="drmvsn-sidebar">
        <div class="xans-element- xans-myshop xans-myshop-asyncbenefit">
            <div class="ec-base-box typeMember gMessage">
                <div class="information">
                    <p class="thumbnail displaynone"><img src="//www.dona-d.com/web/upload/mg_img_SV1.png" alt=""
                            class="myshop_benefit_group_image_tag"></p>
                    <div class="description flex align-center justify-between flex-wrap sidebar-title">
                        <div class="customer-name font-bold">
                            <span>
                                <span class="xans-member-var-name">
                                </span>
                            </span>
                            {{ strtoupper(Auth::user()->first_name) }}
                        </div>
                        <div class="xans-element- xans-order xans-order-dcinfo group-name flex align-center font-bold ">
                            [Silver]

                        </div>

                        <div class="mobile-level-info mobile-phone-only cs-txt-box px-20 py-20">
                            <div class=" gBlank5" id="sGradeAutoDisplayArea">
                                <p class=" sAutoGradeDisplay ">
                                    <strong>
                                        [<span class="sNextGroupIconArea"><img
                                                src="//www.dona-d.com/web/bbs_member_icon/member/1680083913.png"
                                                alt="gold" class="myshop_benefit_next_group_icon_tag"></span><span
                                            class="xans-member-var-sNextGrade">Gold</span>]
                                    </strong>
                                    The remaining purchase amount is <strong><span
                                            class="xans-member-var-sGradeIncreasePrice">500,000won</span></strong>
                                    no see. (recent <span class="xans-member-var-sGradePeriod">12month
                                        during</span> Purchase amount : <span
                                        class="xans-member-var-sPeriodOrderPrice">0won</span>)
                                </p>
                                <p class="txtInfo txt11">This is an estimated amount based on
                                    upgrade criteria and may differ from the total order amount..
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="level-benefit displaynone"><a href="#">등급별 혜택보기</a></div>
                    <div class="membership-benefits displaynone">
                        <div class="order-history-3m">
                            <div class="text">최근 3개월 동안</div>
                            <div class="benefit-box">
                                구매금액 : <span class="value"><span
                                        class="xans-member-var-sPeriodOrderPrice">0원</span></span> ｜구매건수 :
                                <span class="value"><span class="xans-member-var-sPeriodOrderCount">0건</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invite ec-base-box typeThinBg gMerge displaynone">
                <strong class="txtEm">Copy the address and invite your friends to the shopping mall.</strong>
                <div class="dv-field has-addons">
                    <div class="dv-control"><input type="text" class="input" id="" value="///?reco_id="
                            readonly=""></div>
                    <div class="dv-control">
                        <a href="#none" class="btn prior-1" onclick="">Copy address</a>
                    </div>
                </div>

                <ul>
                    <li>- Friends will be paid immediately upon signing up..</li>
                    <li>- </li>
                </ul>
            </div>
        </div>

        <ul class="xans-element- xans-myshop xans-myshop-asyncbankbook cs-txt-box px-20 py-20 ">
            <li>
                <a href="#" class="flex align-center justify-between">
                    <span class="title">Coupon</span>
                    <span class="data"><span id="xans_myshop_bankbook_coupon_cnt">0
                        </span>piece</span>
                </a>
            </li>
            <li class="mt-20">
                <a href="#" class="flex align-center justify-between">
                    <span class="title">Reserves</span>
                    <span class="data"><!--<span id="xans_myshop_bankbook_total_mileage"></span>--><span
                            id="xans_myshop_bankbook_avail_mileage">0 đ</span></span>
                </a>
            </li>
            <li class="mt-20">
                <a href="#" class="flex align-center justify-between">
                    <span class="title">Deposit</span>
                    <span class="data"><span
                            id="xans_myshop_bankbook_deposit">{{ number_format($totalDeposit, 0, ',', '.') }}
                            đ</span></span>
                </a>
            </li>
        </ul>

        <div class="cs-list">
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.index' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.index') }}">Account
                        information</a></summary>
            </details>
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.order' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.order') }}">Order History</a>
                </summary>
            </details>
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.interest' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.interest') }}">Product of
                        interest</a></summary>
            </details>
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.member' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.member') }}">Profile</a>
                </summary>
            </details>
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.benefit' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.benefit') }}">Membership
                        benefits</a></summary>
            </details>
            <details class="accordion sidebar-link mt-30">
                <summary class="accordion-title no-sub-links"><a
                        class="{{ Route::currentRouteName() == 'profile.delivery.address' ? '' : 'text-secondary' }}"
                        href="{{ route('profile.delivery.address') }}">Delivery address
                        management</a></summary>
            </details>
        </div>

        <div class="xans-element- xans-layout xans-layout-statelogon mt-30"><a href="{{ route('auth.member.logout') }}"
                class="btn prior-2 width-full justify-center">Logout</a>
        </div>
    </aside>
</div>
