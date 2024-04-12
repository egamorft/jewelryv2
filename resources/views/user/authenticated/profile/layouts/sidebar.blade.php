<div id="drmvsn-basic-sidebar">
    <aside id="myshop-sidebar" class="drmvsn-sidebar">
        <div class="xans-element- xans-myshop xans-myshop-asyncbenefit">
            <div class="ec-base-box typeMember gMessage ">
                <div class="information">
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
                </div>
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
                    <span class="data"><span id="xans_myshop_bankbook_deposit">{{ number_format($totalDeposit, 0, ',', '.') }} đ</span></span>
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


        <div class="xans-element- xans-layout xans-layout-statelogon mt-30 "><a
                href="{{ route('auth.member.logout') }}" class="btn prior-2 width-full justify-center">Logout</a>
        </div>

    </aside>
</div>
