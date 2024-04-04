@extends('user.authenticated.profile.layouts.profile')

@section('pages_style')
    <style>
        .switch {
            display: flex;
            align-items: center;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: relative;
            cursor: pointer;
            width: 50px;
            height: 26px;
            background-color: #e9ecef;
            /* Default color when off */
            transition: 0.4s;
            border-radius: 34px;
            margin-left: 10px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        .label {
            font-size: 14px;
            color: #333;
            margin-right: 10px;
        }

        input:checked+.slider {
            background-color: #28a745;
            /* Color when on */
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>
@endsection

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="drmvsn-login-join common-required">
            <div class="title-area">
                <span class="mobile-only go-back"></span>
                <h2>REGISTER DELIVERY ADDRESS</h2>
            </div>

            <form id="registerAddress" name="registerAddress" action="{{ route('profile.delivery.store.address') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="xans-element- xans-member xans-member-edit">
                    <div class="signup-form ">
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex" id="">name <span
                                        class="required">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-between align-center">
                                        <input id="first-name" name="first_name" class="ec-member-name me-2"
                                            placeholder="First name" value="{{ old('first_name') }}" type="text">
                                        <input id="last-name" name="last_name" class="ec-member-name ms-2"
                                            placeholder="Last name" value="{{ old('last_name') }}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30 ">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">address <span class="required">*</span></label>
                            <div class="dv-control has-control-children">
                                <div class="mb-10">
                                    <input id="address" name="address" class="inputTypeText" placeholder="Address"
                                        value="{{ old('address') }}" type="text">
                                </div>
                                <div class="mb-10"><input id="region" name="region" class="inputTypeText"
                                        placeholder="Country/region" value="{{ old('region') }}" type="text">
                                </div>
                                <div class="flex justify-between align-center mb-10">
                                    <input id="city" name="city" class="ec-member-name me-2" placeholder="City"
                                        value="{{ old('city') }}" type="text">
                                    <input id="country" name="country" class="ec-member-name ms-2"
                                        placeholder="Country(optional)" value="{{ old('country') }}" type="text">
                                </div>
                                <div class="flex justify-between align-center">
                                    <input id="postcode" name="postcode" class="ec-member-name me-2" placeholder="Postcode"
                                        value="{{ old('postcode') }}" type="text">
                                    <input id="phone" name="phone" class="ec-member-name ms-2"
                                        placeholder="Phone(optional)" value="{{ old('phone') }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">Email<span class="required">*</span></label>
                            <div class="dv-control">
                                <input id="email" name="email" placeholder="Email" value="{{ old('email') }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30">
                        <div class="d-flex justify-content-between">
                            <label for="switcher" class="label">Set as default address</label>
                            <div class="switch">
                                <input id="switcher" type="checkbox" name="isDefault">
                                <span class="slider"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-base-button justify-content-center">
                    <div class="btns flex gap-10 width-50pc">
                        <button type="reset" class="btn prior-2 width-full justify-center">Cancel</button>
                        <button type="submit" class="btn prior-1 width-full justify-center">Registration</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
