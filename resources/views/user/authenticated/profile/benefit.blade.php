@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="donad-membership-menu">
            <ul class="flex align-center">
                <li><a href="#donad-membership-coupon" class="width-full justify-center flex cursor-pointer">Membership
                        Benefits</a></li>
                <li><a href="#donad-membership-benefit" class="width-full justify-center flex cursor-pointer">Benefits by
                        level</a></li>
                <li><a href="#donad-download-coupon" class="width-full justify-center flex cursor-pointer">Coupon download</a>
                </li>
            </ul>
        </div>

        <div pandassi-banner-group="ready" id="donad-membership-coupon" class="border-bottom mt-40"
            pandassi-banner-group-code="5387d7bcef8979fd57a2">
            <div class="drmvsn-membership-title">
                <h2>Membership Benefits</h2>
            </div>
            <div class="membership-coupon mt-30">
                <div pandassi-banner="ready" class="flex align-center">
                    <div class="coupon-info">
                        <div class="donad-mem-coupon">5,000 won</div>
                    </div>
                    <div>
                        <div class="donad-mem-coupon-info">Up to 5,000 won in savings for new members <br>(Basic savings of
                            4,000 won | Additional 1,000 won if you agree to receive SMS)
                        </div>
                    </div>
                </div>
                <div pandassi-banner="ready" class="flex align-center">
                    <div class="coupon-info">
                        <div class="donad-mem-coupon">Up to 16%</div>
                    </div>
                    <div>
                        <div class="donad-mem-coupon-info">Up to 16% regular discount & savings by membership level</div>
                    </div>
                </div>
                <div pandassi-banner="ready" class="flex align-center">
                    <div class="coupon-info">
                        <div class="donad-mem-coupon">Birthday coupon</div>
                    </div>
                    <div>
                        <div class="donad-mem-coupon-info">Up to 10% birthday coupon issued by membership level</div>
                    </div>
                </div>
                <div pandassi-banner="ready" class="flex align-center">
                    <div class="coupon-info">
                        <div class="donad-mem-coupon">Earn reviews</div>
                    </div>
                    <div>
                        <div class="donad-mem-coupon-info">1% unlimited savings when writing a photo review<br><a
                                href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="membership-desc">[Birthday Coupon]<br>- It is automatically issued 15 days before the birthday you
                indicated when registering as a member, and the expiration date is 30 days.<br><br>[Use of Points]<br>-
                Purchase points and level points can be used without limit when purchasing over 50,000 won, and the validity
                period is 1 year.<br>- Points used when ordering will not be paid out.<br><br>[Use of coupons] <br>- The use
                of coupons may be restricted for some products and event products. (New product discounts, group purchases,
                etc.)<br>- Only one coupon can be used per order.</div>
        </div>

        <div pandassi-banner-group="ready" id="donad-membership-benefit" class="border-bottom pb-10"
            pandassi-banner-group-code="46686b17bb3be3e420ea">
            <div class="drmvsn-membership-title">
                <h2>Membership level</h2>
            </div>
            <div class="membership-info-group">
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">5CTDIA</span>
                        <span class="donad-mem-lv-info">10% regular discount, 6% accumulated <br>10% birthday coupon<br><span>Customers purchasing more than KRW 50 million in actual payment amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">4CTDIA</span>
                        <span class="donad-mem-lv-info">Regular discount 8%, accumulated 6% <br>10% birthday coupon<br><span>Customers with an actual payment amount of 25 million won or more</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">3CT<br>DIA</span>
                        <span class="donad-mem-lv-info">상시할인 7%, 적립 6% <br>10% 생일쿠폰<br><span>실 결제금액 1,000만원 이상
                                구매고객</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">2CT<br>DIA</span>
                        <span class="donad-mem-lv-info">상시할인 5%, 적립 5% <br>5% 생일쿠폰<br><span>실 결제금액 500만원 이상
                                구매고객</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">1CT<br>DIA</span>
                        <span class="donad-mem-lv-info">상시할인 3%, 적립 4% <br>5% 생일쿠폰<br><span>실 결제금액 300만원 이상
                                구매고객</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">PLATINUM</span>
                        <span class="donad-mem-lv-info">상시할인 1%, 적립 3% <br>5% 생일쿠폰<br><span>실 결제금액 100만원 이상
                                구매고객</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">GOLD</span>
                        <span class="donad-mem-lv-info">구매 적립 1% <br>5% 생일쿠폰<br><span>실 결제금액 30만원 이상 구매고객</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">SILVER</span>
                        <span class="donad-mem-lv-info">구매 적립 1% <br>5% 생일쿠폰<br><span>신규 고객</span></span>
                    </div>
                </div>
            </div>
            <div class="membership-desc">[회원등급]<br>- 회원 등급은(12개월기준) 실결제금액에 따라 매월 1일, 1개월 단위로변경됩니다. (구매완료 시점 기준)<br>- 등급별 혜택은
                결제 수단에 상관없이 5만원이상 구매시 적용됩니다.<br><br>[구매적립]<br>- 구매 적립금은 주문시 구매한 상품에 대한 적립금 1%, 주문시 회원등급에 따른 적립금이 추가 적립됩니다.
                (실 결제금액 기준)<br>- 적립 금액은 카페24 시스템의 자동 계산법을 적용합니다. <br>단순 % 계산과는 차이가 있을 수 있으며, 이에따른 적립 금액 조정 및 증빙에 대한 문의는 본사에서
                처리가 어려우니 이점 참고해주세요.</div>
        </div>

        <div id="donad-download-coupon">
            <div class="drmvsn-membership-title">
                <h2>쿠폰 다운로드</h2>
            </div>
            <div class="membership-coupon"><a href="/myshop/coupon/coupon.html"
                    class="btn prior-1 width-full is-custom justify-center">쿠폰 다운로드</a></div>
        </div>
    </div>
@endsection
