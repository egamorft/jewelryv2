@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="drmvsn-login-join common-required">
            <div class="title-area">
                <span class="mobile-only go-back"></span>
                <h2>Edit member information</h2>
            </div>

            <form id="editForm" name="editForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="xans-element- xans-member xans-member-edit">
                    <div class="signup-form ">
                        <div class="form-row mb-30 ">
                            <div class="dv-field has-control-children">
                                <label class="label mb-10 inline-flex">id <span class="required">*</span></label>
                                <div class="dv-control">
                                    <input id="member_id" fw-label="id" class="inputTypeText"
                                        value="{{ Auth::user()->uuid }}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex" id="">name <span
                                        class="required">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-between align-center">
                                        <input id="first-name" name="first_name" class="ec-member-name me-2"
                                            placeholder="First name" value="{{ old('first_name') ?? Auth::user()->first_name }}" type="text">
                                        <input id="last-name" name="last_name" class="ec-member-name ms-2"
                                            placeholder="Last name" value="{{ old('last_name') ?? Auth::user()->last_name }}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30 ">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">address</label>
                            <div class="dv-control has-control-children">
                                <div class="mb-10">
                                    <input id="address" name="address" class="inputTypeText" placeholder="Address"
                                        value="{{ old('address') ?? Auth::user()->address }}" type="text">
                                </div>
                                <div class="mb-10"><input id="region" name="region" class="inputTypeText"
                                        placeholder="Country/region" value="{{ old('region') ?? Auth::user()->region }}" type="text">
                                </div>
                                <div class="flex justify-between align-center mb-10">
                                    <input id="city" name="city" class="ec-member-name me-2" placeholder="City"
                                        value="{{ old('city') ?? Auth::user()->city }}" type="text">
                                    <input id="country" name="country" class="ec-member-name ms-2"
                                        placeholder="Country(optional)" value="{{ old('country') ?? Auth::user()->country }}" type="text">
                                </div>
                                <div class="flex justify-between align-center">
                                    <input id="postcode" name="postcode" class="ec-member-name me-2" placeholder="Postcode"
                                        value="{{ old('postcode') ?? Auth::user()->postcode }}" type="text">
                                    <input id="phone" name="phone" class="ec-member-name ms-2"
                                        placeholder="Phone(optional)" value="{{ old('phone') ?? Auth::user()->phone }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">Email<span class="required">*</span></label>
                            <div class="dv-control">
                                <input id="email" disabled placeholder="Email" value="{{ Auth::user()->email }}"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30 ">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">Gender <span class="required ">*</span></label>
                            <div class="dv-control flex align-center child-mr-5 child-label-mr-10 mb-3">
                                <input id="is_sex0" name="gender" value="1" type="radio"
                                    {{ old('gender', Auth::user()->gender) == 1 ? 'checked' : '' }}>
                                <label for="is_sex0">Male</label>
                            </div>
                            <div class="dv-control flex align-center child-mr-5 child-label-mr-10">
                                <input id="is_sex1" name="gender" value="0" type="radio"
                                    {{ old('gender', Auth::user()->gender) == 0 ? 'checked' : '' }}>
                                <label for="is_sex1">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-30 ">
                        <div class="dv-field">
                            <label class="label mb-10 inline-flex">Birth date</label>
                            <div class="dv-control has-control-children">
                                @php
                                    $birthday = Auth::user()->birthday;
                                    $year = null;
                                    $month = null;
                                    $day = null;
                                    if ($birthday) {
                                        $year = date('Y', strtotime($birthday));
                                        $month = date('m', strtotime($birthday));
                                        $day = date('d', strtotime($birthday));
                                    }
                                @endphp
                                <div class="flex justify-between align-center">
                                    <input id="year" name="year" class="ec-member-name me-2" placeholder="Year"
                                        value="{{ old('year') ?? $year }}" type="text">
                                    <input id="month" name="month" class="ec-member-name mx-2" placeholder="Month"
                                        value="{{ old('month') ?? $month }}" type="text">
                                    <input id="day" name="day" class="ec-member-name ms-2" placeholder="Day"
                                        value="{{ old('day') ?? $day }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-base-button">
                    <div class="btns flex gap-10 width-full">
                        <button type="submit" class="btn prior-1 width-full justify-center">Save changes</button>
                        <button type="reset" class="btn prior-2 width-full justify-center">Cancel</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
