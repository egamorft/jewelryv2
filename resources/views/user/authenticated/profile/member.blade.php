@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="drmvsn-login-join common-required">
            <div class="title-area">
                <span class="mobile-only go-back"></span>
                <h2>Edit member information</h2>
            </div>

            <div class="xans-element- xans-member xans-member-updateeventlogon ec-base-box displaynone ">
                <div class="mb-30">
                    <strong class="inline-flex title mb-10">We are currently holding an event where we will pay you when you
                        edit your member information.</strong>
                    <ul>
                        <li>Event Period : </li>
                        <li>Payment will be made if the conditions below are met:.<br></li>
                    </ul>
                </div>
            </div>

            <form id="editForm" name="editForm" action="#" method="post" target="_self" enctype="multipart/form-data">
                <div class="xans-element- xans-member xans-member-edit">
                    <div class="signup-form displaynone">
                        <div class="form-row mb-30">
                            <div class="dv-field displaynone">
                                <label class="label mb-10 inline-flex">Member classification</label>
                                <div class="dv-control flex align-center child-mr-5 child-label-mr-10"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Certification</label>
                                <div class="dv-control mt-10">
                                    <strong class="txtEm">Not certified</strong>
                                    <ul class="certif-info mt-10">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Membership verification</label>
                                <div class="dv-control mt-10 mb-10">
                                    <div class="certif-form mb-20" id="ipinWrap">
                                        <a href="#none" class="btn prior-1 is-small" onclick=""><img
                                                src="//img.echosting.cafe24.com/skin/base/common/btn_icon_ipin.gif"
                                                alt="">
                                            I-PIN authentication</a>
                                        <div class="is-help mt-10">i-PIN is a system that verifies your identity without
                                            providing your resident registration number to the website in order to protect
                                            your personal information.
                                            This is a personal identification number service on the Internet.<br>If you
                                            would like to sign up through i-PIN, please click the i-PIN authentication
                                            button to proceed.</div>
                                    </div>
                                    <div class="certif-form mb-20" id="mobileWrap">
                                        <a href="#none" class="btn prior-1 is-small">cell phone Certification</a>
                                        <div class="is-help mt-10">Verify your identity using a mobile phone in your name..
                                        </div>
                                    </div>
                                    <div class="certif-form mb-20" id="emailWrap">
                                        <div class="is-help mt-10">Basic Information &gt; We will verify your identity using
                                            the information you entered in the email field..<br>Entered after modifying the
                                            information
                                            A verification email will be sent to your email address, so please check it..
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <h3 class="displaynone">기본정보</h3> -->
                    <div class="signup-form ">
                        <div class="form-row mb-30 ">
                            <div class="dv-field has-control-children">
                                <label class="label mb-10 inline-flex">id <span class="required">*</span></label>
                                <div class="dv-control">
                                    <input id="member_id" name="member_id"
                                        fw-filter="isFill&amp;isFill&amp;isMin[4]&amp;isMax[16]&amp;isIdentity"
                                        fw-label="id" fw-msg="" class="inputTypeText" placeholder=""
                                        readonly="readonly" value="" type="text">
                                    <div class="mt-10 is-help"> Lowercase English letters/numbers, 4 to 16 characters</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">password <span class="required ">*</span></label>
                                <div class="dv-control has-control-children">
                                    <input id="passwd" name="passwd" fw-filter="isMin[4]&amp;isMax[16]"
                                        fw-label="password" fw-msg="" autocomplete="off" maxlength="16" disabled="1"
                                        value="" type="password">
                                    <div class="ec-base-tooltip input-helper-layer ">
                                        <div class="content">
                                            <strong class="txtWarn">※ password input conditions</strong>
                                            <ul class="ec-base-help typeDash gBlank10 txtWarn">
                                                <li>Combination of 2 or more of uppercase letters, lowercase letters,
                                                    numbers, and special characters</li>
                                                <li>8 to 16 characters in length</li>
                                                <li>Possible special characters for input:<br>&nbsp;&nbsp;&nbsp; ~ ` ! @ # $
                                                    % ^ ( ) * _ - = { } [ ] | ; : &lt; &gt; , . ? /</li>
                                                <li>No spaces allowed</li>
                                                <li>No consecutive use of characters or numbers</li>
                                                <li>No repetition of the same character or number</li>
                                                <li>Cannot include the username</li>
                                            </ul>
                                        </div>
                                        <a href="#none" class="position-absolute btn-layer-close" title="닫기">
                                            <svg class="ec-base-layer-close-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="10" height="10" viewBox="0 0 10 10">
                                                <path d="M8.986,9.646-.354.307l.66-.66,9.34,9.34Z"
                                                    transform="translate(0.354 0.354)"></path>
                                                <path d="M.307,9.646l-.66-.66,9.34-9.34.66.66Z"
                                                    transform="translate(0.354 0.354)"></path>
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="mt-10 is-help">(Combination of two or more of English upper and lower case
                                    letters/numbers/special characters, 8 to 16 characters)</div>
                            </div>
                        </div>
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">verify password <span
                                        class="required">*</span></label>
                                <div class="dv-control"><input id="user_passwd_confirm" name="user_passwd_confirm"
                                        fw-filter="isMatch[passwd]" fw-label="verify password" fw-msg="비밀번호가 일치하지 않습니다."
                                        autocomplete="off" maxlength="16" disabled="1" value=""
                                        type="password">
                                    <div class="mt-10"><span id="pwConfirmMsg"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">New password</label>
                                <div class="dv-control has-control-children">
                                    <div class="eTooltip">
                                        <input id="new_passwd" name="new_passwd" fw-filter="isMin[4]&amp;isMax[16]"
                                            fw-label="New password" fw-msg="" maxlength="16" disabled="1"
                                            value="" type="password">
                                        <div class="ec-base-tooltip input-helper-layer">
                                            <div class="content">
                                                <strong class="font-400 inline-flex mb-10">※ Password entry
                                                    conditions</strong>
                                                <ul class="ec-base-help txtWarn">
                                                    - Combination of two or more of upper and lower case
                                                    letters/numbers/special characters, 8 to 16 characters<br>- Special
                                                    characters that can be entered
                                                    <br>&nbsp;&nbsp;&nbsp; ~ ` ! @ # $ % ^ ( ) * _ - = { } [ ] | ; : &lt;
                                                    &gt; , . ? /<br>- Space input is not possible<br>- Consecutive letters
                                                    and numbers cannot be used<br>- Repeating the same letters and numbers
                                                    unavailable<br>- ID cannot be included
                                                </ul>
                                            </div>
                                            <a href="#none" class="position-absolute btn-layer-close" title="닫기">
                                                <svg class="ec-base-layer-close-svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.986,9.646-.354.307l.66-.66,9.34,9.34Z"
                                                        transform="translate(0.354 0.354)"></path>
                                                    <path d="M.307,9.646l-.66-.66,9.34-9.34.66.66Z"
                                                        transform="translate(0.354 0.354)"></path>
                                                </svg></a>
                                        </div>
                                    </div>
                                    <div class="mt-10 is-help">(Combination of two or more of upper and lower case
                                        letters/numbers/special characters, 8 to 16 characters)</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">New password confirmation</label>
                                <div class="dv-control"><input id="new_passwd_confirm" name="new_passwd_confirm"
                                        fw-filter="isMin[4]&amp;isMax[16]" fw-label="password" fw-msg="" maxlength="16"
                                        disabled="1" value="" type="password">
                                    <div class="mt-10 is-help"><span id="new_pwConfirmMsg"></span></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Password confirmation question <span class="required">*</span></label>
                                <div class="dv-control"><select id="hint" name="hint" fw-filter=""
                                        fw-label="hint" fw-msg="">
                                        <option value="hint_01">A place of memorable memories?</option>
                                        <option value="hint_02">His life motto is?</option>
                                        <option value="hint_03">His No. 1 treasure is?</option>
                                        <option value="hint_04">The most memorable teacher’s name is?</option>
                                        <option value="hint_05">If you have a secret about your body that others don’t know about?</option>
                                        <option value="hint_06">추억하고 싶은 날짜가 있다면?</option>
                                        <option value="hint_07">받았던 선물 중 기억에 남는 독특한 선물은?</option>
                                        <option value="hint_08">유년시절 가장 생각나는 친구 이름은?</option>
                                        <option value="hint_09">인상 깊게 읽은 책 이름은?</option>
                                        <option value="hint_10">읽은 책 중에서 좋아하는 구절이 있다면?</option>
                                        <option value="hint_11">자신이 두번째로 존경하는 인물은?</option>
                                        <option value="hint_12">친구들에게 공개하지 않은 어릴 적 별명이 있다면?</option>
                                        <option value="hint_13">초등학교 때 기억에 남는 짝꿍 이름은?</option>
                                        <option value="hint_14">다시 태어나면 되고 싶은 것은?</option>
                                        <option value="hint_15">내가 좋아하는 캐릭터는?</option>
                                    </select></div>
                            </div>
                        </div> --}}

                        {{-- <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">비밀번호 확인 답변 <span class="required">*</span></label>
                                <div class="dv-control"><input id="hint_answer" name="hint_answer" fw-filter=""
                                        fw-label="비밀번호 확인시 답변" fw-msg="" class="inputTypeText" placeholder=""
                                        value="" type="text"></div>
                            </div>
                        </div> --}}
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex" id="">name <span
                                        class="required">*</span></label>
                                <div class="dv-control"><input id="name" name="name"
                                        fw-filter="isFill&amp;isMax[30]" fw-label="name" fw-msg=""
                                        class="ec-member-name" placeholder="" maxlength="30" readonly="readonly"
                                        value="NGUYEN" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">name(English) </label>
                                <div class="dv-control"><input id="name_en" name="name_en"
                                        fw-filter="isMax[30]&amp;isAlphaSpace" fw-label="name(English)" fw-msg=""
                                        class="ec-member-name" placeholder="" maxlength="30" value=""
                                        type="text">
                                    <div class="mt-10 is-help">name - Please enter in last name format.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Corporation name <span class="required">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Corporation number <span class="required">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">business name <span class="required">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">Business Number <span class="required">*</span></label>
                                <div class="dv-control">
                                    <a href="#none" class="btn prior-1 displaynone" onclick="">double check</a>
                                    <div class="mt-10 is-help"><span id=""></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">nationality <span class="required">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">address <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-start align-center mb-10">
                                        <input id="postcode1" name="postcode1" fw-filter="isLengthRange[1][14]"
                                            fw-label="zip code 1" fw-msg="" class="inputTypeText" placeholder=""
                                            readonly="readonly" maxlength="14" value="" type="text"> <a
                                            href="#none" class="btn prior-1"
                                            id="postBtn">Zip code</a>
                                    </div>
                                    <div class="mb-10"><input id="addr1" name="addr1" fw-filter=""
                                            fw-label="address" fw-msg="" class="inputTypeText" placeholder=""
                                            readonly="readonly" value="" type="text">
                                        <div class="mt-10 is-help">Basic address</div>
                                    </div>
                                    <div class=""><input id="addr2" name="addr2" fw-filter=""
                                            fw-label="address" fw-msg="" class="inputTypeText" placeholder=""
                                            value="" type="text">
                                        <div class="mt-10 is-help">The remaining address (Optional input possible)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 ">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">휴대전화 <span class="required ">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-between align-center"><select id="mobile1" name="mobile[]"
                                            fw-filter="isNumber&amp;isFill" fw-label="휴대전화" fw-alone="N"
                                            fw-msg="">
                                            <option value="010">010</option>
                                            <option value="011">011</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                            <option value="019">019</option>
                                        </select>-<input id="mobile2" name="mobile[]" maxlength="4"
                                            fw-filter="isNumber&amp;isFill" fw-label="휴대전화" fw-alone="N"
                                            fw-msg="" placeholder="" value="" type="text">-<input
                                            id="mobile3" name="mobile[]" maxlength="4"
                                            fw-filter="isNumber&amp;isFill" fw-label="휴대전화" fw-alone="N"
                                            fw-msg="" placeholder="" value="" type="text"><button
                                            type="button" class="btn prior-2 displaynone" id="btn_action_verify_mobile"
                                            onclick="memberVerifyMobile.editSendVerificationNumber(); return false;">인증번호받기</button>
                                    </div>
                                    <div class="mt-10">
                                        <p class="is-error displaynone" id="result_send_verify_mobile_fail">
                                        </p>
                                        <ul class="is-help displaynone" id="result_send_verify_mobile_success">
                                            <li>인증번호가 발송되었습니다, 인증번호를 받지 못하셨다면 휴대폰 번호를 확인해 주세요.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">이메일 <span class="required">*</span></label>
                                <div class="dv-control">
                                    <input id="email1" name="email1" fw-filter="isFill&amp;isEmail" fw-label="이메일"
                                        fw-alone="N" fw-msg="" placeholder="" value="" type="text">
                                    <div class="mt-10"><span id="emailMsg"></span></div>
                                    <div class="displaynone mt-10 is-help">이메일 주소 변경 시 로그아웃 후 재인증을 하셔야만
                                        로그인이
                                        가능합니다.<br>인증 메일은 24시간 동안 유효하며, 유효 시간이 만료된 후에는 가입 정보로 로그인 하셔서 재발송 요청을 해주시기 바랍니다.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <h3 class="">추가정보</h3> -->
                    <div class="signup-form">
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">별명 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="nick_name" name="nick_name" fw-filter=""
                                        fw-label="별명" fw-msg="" class="inputTypeText" placeholder=""
                                        maxlength="20" value="egamorfthehe" type="text">
                                    <div class="mt-10 is-help">한글2~10자/영문 대소문자4~20자/숫자 혼용가능
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">결혼기념일 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-between align-center"><input id="marry_year"
                                            name="marry_year" fw-filter="" fw-label="결혼 기념일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="4" value=""
                                            type="text"><span class="px-5">년</span><input id="marry_month"
                                            name="marry_month" fw-filter="" fw-label="결혼 기념일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="2" value=""
                                            type="text"><span class="px-5">월</span><input id="marry_day"
                                            name="marry_day" fw-filter="" fw-label="결혼 기념일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="2" value=""
                                            type="text"><span class="pl-5">일</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">배우자생일 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control has-control-children">
                                    <div class="flex justify-between align-center"><input id="partner_year"
                                            name="partner_year" fw-filter="" fw-label="배우자 생일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="4" value=""
                                            type="text"><span class="px-5">년</span><input id="partner_month"
                                            name="partner_month" fw-filter="" fw-label="배우자 생일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="2" value=""
                                            type="text"><span class="px-5">월</span><input id="partner_day"
                                            name="partner_day" fw-filter="" fw-label="배우자 생일" fw-msg=""
                                            class="inputTypeText" placeholder="" maxlength="2" value=""
                                            type="text"><span class="pl-5">일</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">자녀 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="child" name="child" fw-filter=""
                                        fw-label="자녀" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="child_01">없음</option>
                                        <option value="child_02">1</option>
                                        <option value="child_03">2</option>
                                        <option value="child_04">3</option>
                                        <option value="child_05">4</option>
                                        <option value="child_06">5</option>
                                        <option value="child_07">6</option>
                                        <option value="child_08">7</option>
                                        <option value="child_09">8</option>
                                        <option value="child_10">9</option>
                                        <option value="child_11">10 이상</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">최종학력 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="school" name="school" fw-filter=""
                                        fw-label="최종학력" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="school_01">초등학교재학</option>
                                        <option value="school_02">초등학교졸업</option>
                                        <option value="school_03">중학교재학</option>
                                        <option value="school_04">중학교졸업</option>
                                        <option value="school_05">고등학교재학</option>
                                        <option value="school_06">고등학교졸업</option>
                                        <option value="school_07">대학교재학</option>
                                        <option value="school_08">대학교졸업</option>
                                        <option value="school_09">대학원재학</option>
                                        <option value="school_10">대학원졸업이상</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">직종 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="job_class" name="job_class" fw-filter=""
                                        fw-label="직종" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="job_class_05">서비스</option>
                                        <option value="job_class_06">교육</option>
                                        <option value="job_class_07">부동산/운송</option>
                                        <option value="job_class_08">농/임/수/광업</option>
                                        <option value="job_class_09">금융</option>
                                        <option value="job_class_10">유통</option>
                                        <option value="job_class_11">예술</option>
                                        <option value="job_class_12">의료</option>
                                        <option value="job_class_13">법률</option>
                                        <option value="job_class_14">제조/무역</option>
                                        <option value="job_class_15">건설업</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">직업 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="job" name="job" fw-filter=""
                                        fw-label="직업" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="job_01">학생</option>
                                        <option value="job_02">회사원</option>
                                        <option value="job_03">자영업</option>
                                        <option value="job_04">무직</option>
                                        <option value="job_05">기타</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">연소득 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="earning" name="earning" fw-filter=""
                                        fw-label="연소득" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="earning_01">없음</option>
                                        <option value="earning_02">1000만원 이하</option>
                                        <option value="earning_03">1200만원 이하</option>
                                        <option value="earning_04">1500만원 이하</option>
                                        <option value="earning_05">1800만원 이하</option>
                                        <option value="earning_06">2000만원 이하</option>
                                        <option value="earning_07">2500만원 이하</option>
                                        <option value="earning_08">3000만원 이하</option>
                                        <option value="earning_09">4000만원 이하</option>
                                        <option value="earning_10">5000만원 이하</option>
                                        <option value="earning_11">5000만원 이상</option>
                                        <option value="earning_12">기타</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">자동차 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="car" name="car" fw-filter=""
                                        fw-label="자동차" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="car_01">없음</option>
                                        <option value="car_02">1000cc 이하</option>
                                        <option value="car_03">1000cc ~ 1500cc</option>
                                        <option value="car_04">1500cc ~ 2000cc</option>
                                        <option value="car_05">2000cc ~ 3000cc</option>
                                        <option value="car_06">3000cc ~ 4000cc</option>
                                        <option value="car_07">4000cc 이상</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">지역 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="region" name="region" fw-filter=""
                                        fw-label="지역" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="region_01">경기</option>
                                        <option value="region_02">서울</option>
                                        <option value="region_03">인천</option>
                                        <option value="region_04">강원</option>
                                        <option value="region_05">충남</option>
                                        <option value="region_06">충북</option>
                                        <option value="region_07">대전</option>
                                        <option value="region_08">경북</option>
                                        <option value="region_09">경남</option>
                                        <option value="region_10">대구</option>
                                        <option value="region_11">부산</option>
                                        <option value="region_12">울산</option>
                                        <option value="region_13">전북</option>
                                        <option value="region_14">전남</option>
                                        <option value="region_15">광주</option>
                                        <option value="region_15_01">세종</option>
                                        <option value="region_16">제주</option>
                                        <option value="region_17">해외</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">인터넷 이용장소 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><select id="internet" name="internet" fw-filter=""
                                        fw-label="인터넷" fw-msg="">
                                        <option value="" selected="selected">선택</option>
                                        <option value="internet_01">집</option>
                                        <option value="internet_02">회사</option>
                                        <option value="internet_03">PC방</option>
                                        <option value="internet_04">기타</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">관심분야 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control">
                                    <div
                                        class="interest child-mr-5 child-label-mr-10 child-mb-5 flex flex-wrap align-start">
                                        <input id="inter_check0" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="0" type="checkbox"><label
                                            for="inter_check0">애니메이션</label>
                                        <input id="inter_check1" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="1" type="checkbox"><label
                                            for="inter_check1">영화/연극</label>
                                        <input id="inter_check2" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="2" type="checkbox"><label
                                            for="inter_check2">놀이공원</label>
                                        <input id="inter_check3" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="3" type="checkbox"><label
                                            for="inter_check3">경품정보</label>
                                        <input id="inter_check4" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="4" type="checkbox"><label
                                            for="inter_check4">미술전시회</label>
                                        <input id="inter_check5" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="5" type="checkbox"><label for="inter_check5">클래식
                                            콘서트</label>
                                        <input id="inter_check6" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="6" type="checkbox"><label
                                            for="inter_check6">패션/미용</label>
                                        <input id="inter_check7" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="7" type="checkbox"><label
                                            for="inter_check7">정치</label>
                                        <input id="inter_check8" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="8" type="checkbox"><label
                                            for="inter_check8">IT/정보통신</label>
                                        <input id="inter_check9" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="9" type="checkbox"><label
                                            for="inter_check9">스포츠</label>
                                        <input id="inter_check10" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="10" type="checkbox"><label
                                            for="inter_check10">요리/음식</label>
                                        <input id="inter_check11" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="11" type="checkbox"><label
                                            for="inter_check11">연예인</label>
                                        <input id="inter_check12" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="12" type="checkbox"><label
                                            for="inter_check12">여성/주부</label>
                                        <input id="inter_check13" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="13" type="checkbox"><label
                                            for="inter_check13">육아</label>
                                        <input id="inter_check14" name="inter_check[]" fw-filter="" fw-label="관심분야"
                                            fw-msg="" value="14" type="checkbox"><label
                                            for="inter_check14">비즈니스/금융/부동산</label>
                                        <input id="inter_check15" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="15" type="checkbox"><label
                                            for="inter_check15">주식/증권</label>
                                        <input id="inter_check16" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="16" type="checkbox"><label
                                            for="inter_check16">스포츠/레져/취미</label>
                                        <input id="inter_check17" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="17" type="checkbox"><label
                                            for="inter_check17">경매/공동구매</label>
                                        <input id="inter_check18" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="18" type="checkbox"><label
                                            for="inter_check18">뉴스/정보</label>
                                        <input id="inter_check19" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="19" type="checkbox"><label
                                            for="inter_check19">컴퓨터/게임</label>
                                        <input id="inter_check20" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="20" type="checkbox"><label
                                            for="inter_check20">대학교/대학원정보</label>
                                        <input id="inter_check21" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="21" type="checkbox"><label
                                            for="inter_check21">건강/의료</label>
                                        <input id="inter_check22" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="22" type="checkbox"><label
                                            for="inter_check22">자동차/여행</label>
                                        <input id="inter_check23" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="23" type="checkbox"><label
                                            for="inter_check23">쇼핑/전자상거래</label>
                                        <input id="inter_check24" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="24" type="checkbox"><label
                                            for="inter_check24">구인/구직</label>
                                        <input id="inter_check25" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="25" type="checkbox"><label
                                            for="inter_check25">어학강좌</label>
                                        <input id="inter_check26" name="inter_check[]" fw-filter=""
                                            fw-label="관심분야" fw-msg="" value="26" type="checkbox"><label
                                            for="inter_check26">기타등등</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="add1" name="add1" fw-filter=""
                                        fw-label="추가항목1" fw-msg="" class="inputTypeText" placeholder=""
                                        maxlength="200" value="" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="add2" name="add2" fw-filter=""
                                        fw-label="추가항목2" fw-msg="" class="inputTypeText" placeholder=""
                                        maxlength="200" value="" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="add3" name="add3" fw-filter=""
                                        fw-label="추가항목3" fw-msg="" class="inputTypeText" placeholder=""
                                        maxlength="200" value="" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="add4" name="add4" fw-filter=""
                                        fw-label="추가항목4" fw-msg="" class="inputTypeText" placeholder=""
                                        maxlength="200" value="" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex"> <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">추천인 아이디 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control"><input id="reco_id" name="reco_id" fw-filter=""
                                        fw-label="추천인 ID" fw-msg="" class="inputTypeText" placeholder=""
                                        value="" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row mb-30 displaynone">
                            <div class="dv-field">
                                <label class="label mb-10 inline-flex">환불계좌 <span
                                        class="required displaynone">*</span></label>
                                <div class="dv-control align-center flex flex-wrap">
                                    <span id=""></span> <a href="#none"
                                        class="btn prior-2 is-small ml-10"><span id="id_has_bank_img"
                                            class="displaynone">환불계좌변경</span><span id="id_reg_bank_img"
                                            class="displaynone">환불계좌등록</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ec-base-button">
                        <div class="btns flex gap-10 width-full">
                            <a href="#none" class="btn prior-1 width-full justify-center"
                                onclick="memberEditAction()">회원정보수정</a>
                            <a href="/index.html" class="btn prior-2 width-full justify-center">취소</a>
                        </div>
                    </div>
                    <div class="btns flex justify-end mt-10">
                        <a href="#none" class="btn px-0 py-0 height-auto simple-link"
                            onclick=" memberDelAction(5000, 0, -1)">회원탈퇴</a>
                        <!-- baseLayerOpen(); -->
                    </div>
                    <!-- 약관 관련 -->
                    <!-- NOTICE: 앱 관련 약관동의 -->
                    <!-- //NOTICE: 앱 관련 약관동의 -->
                    <div class="displaynone ec-base-box agreeArea mt-20">
                        <h3 class="font-400 position-relative inline-flex mb-10 align-center">
                            <span class="agreement-pseudo-label mr-5"><input id="agree_information_check0"
                                    name="agree_information_check[]" fw-filter="" fw-label="개인정보 제3자 제공 동의"
                                    fw-msg="" value="1" type="checkbox"><label
                                    for="agree_information_check0"></label></span>
                            <span class="pointer-events">[선택] 개인정보 제3자 제공 동의</span>
                        </h3>
                        <div class="content">
                            <div class="fr-view fr-view-privacy-optional"></div>
                        </div>
                    </div>
                    <div class="displaynone ec-base-box agreeArea mt-20">
                        <h3 class="font-400 position-relative inline-flex mb-10 align-center">
                            <span class="agreement-pseudo-label mr-5"><input id="agree_consignment_check0"
                                    name="agree_consignment_check[]" fw-filter="" fw-label="개인정보 처리 위탁 동의"
                                    fw-msg="" value="1" type="checkbox"><label
                                    for="agree_consignment_check0"></label></span><span class="pointer-events">[선택] 개인정보
                                처리 위탁에 동의하십니까?</span>
                        </h3>
                        <div class="content">
                            <div class="fr-view fr-view-privacy-optional"></div>
                        </div>
                    </div>
                    <!-- //약관 관련 -->
                    <div id="" class="layerLeave ec-base-layer ">
                        <div class="header position-relative">
                            <h3>회원탈퇴</h3>
                            <a href="#none" class="position-absolute btn-layer-close" title="닫기"
                                onclick="baseLayerClose(); $('#').hide();">
                                <svg class="ec-base-layer-close-svg" xmlns="http://www.w3.org/2000/svg" width="10"
                                    height="10" viewBox="0 0 10 10">
                                    <path d="M8.986,9.646-.354.307l.66-.66,9.34,9.34Z" transform="translate(0.354 0.354)">
                                    </path>
                                    <path d="M.307,9.646l-.66-.66,9.34-9.34.66.66Z" transform="translate(0.354 0.354)">
                                    </path>
                                </svg></a>
                        </div>
                        <div class="content">
                            <div class="ec-base-box type-member">
                                <div class="information">
                                    <strong class="title inline-flex mb-10">혜택 내역</strong>
                                    <div class="description">
                                        <ul>
                                            <li id="">탈퇴시 보유하고 있는 적립금은 모두 삭제됩니다.</li>
                                            <li>현재 적립금 : <strong id="">0</strong>
                                            </li>
                                            <li id="">현재 예치금 : <strong id="">0</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h4>회원탈퇴 사유</h4>
                            <div class="ec-base-table">
                                <table>
                                    <caption>회원탈퇴 사유</caption>
                                    <colgroup>
                                        <col style="width:100%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="px-0-important">
                                                <div class="dv-field">
                                                    <div class="dv-control ">
                                                        <div class="select"></div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr id="">
                                            <td class="px-0-important"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="px-20 pb-20 dv-field flex align-center justify-center gap-10 width-full">
                            <a href="#none" class="btn prior-2 width-full justify-center" id="">탈퇴</a>
                            <a href="#none" class="btn prior-1 width-full justify-center"
                                onclick="$('#').hide();">취소</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="agree_information_check_display" value="T"><input type="hidden"
                    name="agree_consignment_check_display" value="T">
            </form>
        </div>
    </div>
@endsection
