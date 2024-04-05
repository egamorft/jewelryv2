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
                        <span class="donad-mem-lv-info">10% regular discount, 6% accumulated <br>10% birthday
                            coupon<br><span>Customers purchasing more than KRW 50 million in actual payment
                                amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">4CTDIA</span>
                        <span class="donad-mem-lv-info">Regular discount 8%, accumulated 6% <br>10% birthday
                            coupon<br><span>Customers with an actual payment amount of 25 million won or more</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">3CTDIA</span>
                        <span class="donad-mem-lv-info">Regular discount 7%, accumulated 6% <br>10% birthday
                            coupon<br><span>Customers purchasing more than 10 million won in actual payment
                                amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">2CTDIA</span>
                        <span class="donad-mem-lv-info">5% regular discount, 5% accumulated <br>5% birthday
                            coupon<br><span>Customers who purchase more than 5 million won in actual payment
                                amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">1CTDIA</span>
                        <span class="donad-mem-lv-info">Regular discount 3%, accumulated 4% <br>5% birthday
                            coupon<br><span>Customers who purchase more than 3 million won in actual payment
                                amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">PLATINUM</span>
                        <span class="donad-mem-lv-info">1% regular discount, 3% accumulated <br>5% birthday
                            coupon<br><span>Customers who purchase more than KRW 1 million in actual payment
                                amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">GOLD</span>
                        <span class="donad-mem-lv-info">Purchase savings 1% <br>5% birthday coupon<br><span>Customers who
                                purchase more than 300,000 won in actual payment amount</span></span>
                    </div>
                </div>
                <div pandassi-banner="ready" class="membership-info-box mb-30">
                    <div class="flex align-center">
                        <span class="donad-mem-lv">SILVER</span>
                        <span class="donad-mem-lv-info">Purchase savings 1% <br>5% birthday coupon<br><span>new
                                customer</span></span>
                    </div>
                </div>
            </div>
            <div class="membership-desc">[Membership Level]<br>- Membership level (based on 12 months) changes on the 1st of
                every month, on a monthly basis, depending on the actual payment amount. (Based on the time of purchase
                completion)<br>- Benefits for each level are applied to purchases of 50,000 won or more regardless of
                payment method.<br><br>[Purchase points]<br>- Purchase points are 1% for the product purchased when
                ordering, and additional points are accumulated according to membership level when ordering. (Based on
                actual payment amount)<br>- The accumulated amount is calculated automatically using the Cafe24 system.
                <br>Please note that there may be differences from the simple % calculation, and it is difficult for our
                head office to handle inquiries regarding adjustments to the accumulated amount and proof.
            </div>
        </div>

        <div id="donad-download-coupon">
            <div class="drmvsn-membership-title">
                <h2>Coupon download</h2>
            </div>
            <div class="membership-coupon"><a href="#"
                    class="btn prior-1 width-full is-custom justify-center">Download coupon</a></div>
        </div>
    </div>
@endsection
