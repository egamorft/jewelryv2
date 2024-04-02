<!DOCTYPE html>
<html xmlns="//www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<head>
    <meta name="path_role" content="MEMBER_LOGIN" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=1" />

    <meta property="og:site_name" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="" />
    <link rel="shortcut icon" href="" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>

<body>

    <div id="keepgrowLogin">
        <div class="syncWrap">
            <div id="KG_header">
                <div class="topNav">
                    <div class="backBtn" onclick="history.go(-1);return false;">
                    </div>
                    <div class="homeBtn">
                        <a href="/"></a>
                    </div>
                </div>
                <h1 class="shopName"><a href="/"><img
                            src="https://storage.keepgrow.com/b3e3d55d05f1470d95f228515325b2ec/processes/1630310597018.png"
                            class="loaded"></a></h1>
            </div>
            <div id="KG_section">
                <div id="kakaoLogin" class="contents">
                    <h2 class="title">로그인</h2>
                    <p class="text">아이디와 비밀번호 입력하기 귀찮으시죠?<br>1초 회원가입으로 입력없이 간편하게 로그인 하세요.</p>
                    <div class="basicBtn"><a class="btn btnKakao"
                            onclick="MemberAction.kakaosyncLogin('e8ab1b614330d3dd8b5fd19ea261bbb2')">카카오 1초
                            로그인/회원가입</a></div>
                </div>
                <div id="memberLogin" class="contents">
                    <ul id="tabMenu">
                        <li class="active"><a type="button" class="text-decoration-none" id="existingMemberBtn">기존 회원이세요?</a></li>
                        <li class=""><a type="button" class="text-decoration-none" id="guestBtn">비회원
                                배송조회</a></li>
                    </ul>
                    <div id="formWrap">
                        <form class="" id="signInForm" action="#" method="POST"
                            enctype="multipart/form-data">
                            <input id="returnUrl" name="returnUrl" value="https://www.dona-d.com/" type="hidden">
                            <input id="forbidIpUrl" name="forbidIpUrl" value="/index.html" type="hidden">
                            <input id="certificationUrl" name="certificationUrl" value="/intro/adult_certification.html"
                                type="hidden">
                            <input id="sIsSnsCheckid" name="sIsSnsCheckid" value="" type="hidden">
                            <input id="sProvider" name="sProvider" value="" type="hidden">
                            <div id="normalLogin_id">
                                <div class="inputBox"><input id="member_id" name="member_id" fw-filter="isFill"
                                        fw-label="아이디" fw-msg="" class="inputTypeText" placeholder="아이디"
                                        value="" type="text">
                                    <div class="inputBox_orderno"></div>
                                    <div class="inputBox_passwd" style="display: block;">
                                        <div class="chk_passwd" style="display: block;"></div><input
                                            id="member_passwd" name="member_passwd"
                                            fw-filter="isFill&amp;isMin[4]&amp;isMax[16]" fw-label="패스워드"
                                            fw-msg="" autocomplete="off" value="" type="password"
                                            placeholder="비밀번호">
                                    </div>
                                </div>
                                <div class="loginCheckBox"></div>
                                <button class="btn loginBtn"
                                    onclick="MemberAction.login('member_form_1023404781'); return false;">기존 회원
                                    로그인</button>
                                <a href="/order/orderform.html?basket_type=A0000&amp;delvtype=B"
                                    class="btn nomemberBuyBtn" style="display:none">비회원 구매</a>
                                <div class="utilMenu" style="display:block">
                                    <a href="/member/id/find_id.html">아이디 찾기</a>
                                    <a href="/member/passwd/find_passwd_info.html">비밀번호 찾기</a>
                                    <a href="/member/join.html" class="right" style="display:">회원가입</a>
                                </div>
                            </div>
                        </form>
                        <form class="d-none" id="signUpForm" action="#" method="POST"
                            enctype="multipart/form-data">
                            <input id="order_detail_url" name="order_detail_url" value="/myshop/order/detail.html"
                                type="hidden">
                            <div id="normalLogin_id">
                                <div class="inputBox"><input id="order_name" name="order_name" fw-filter="isFill"
                                        fw-label="주문자명" fw-msg="" class="inputTypeText" placeholder="주문자명"
                                        value="" type="text">
                                    <div class="inputBox_orderno"><input id="order_id" name="order_id"
                                            maxlength="18" fw-filter="isOrderid&amp;isFill" fw-label="주문번호"
                                            fw-msg="" value="" type="text" placeholder="주문번호"
                                            title="주문번호"></div>
                                    <div class="inputBox_passwd">
                                        <div class="chk_passwd"></div><input id="order_password"
                                            name="order_password" fw-filter="isFill" fw-label="비회원주문 비밀번호"
                                            fw-msg="" value="" type="password" placeholder="비회원주문 비밀번호">
                                    </div>
                                </div>
                                <div class="loginCheckBox"></div>
                                <button class="btn nomemberLoginBtn" onclick="$(#historyNoLoginForm).submit();">비회원
                                    배송조회</button>
                                <a href="/order/orderform.html?basket_type=A0000&amp;delvtype=B"
                                    class="btn nomemberBuyBtn" style="display:none">비회원 구매</a>
                                <div class="utilMenu" style="display:none">
                                    <a href="/member/id/find_id.html">아이디 찾기</a>
                                    <a href="/member/passwd/find_passwd_info.html">비밀번호 찾기</a>
                                    <a href="/member/join.html" class="right" style="display:">회원가입</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="snsLogin" class="contents">
                    <ul class="snsLoginBox">
                        <li class="btn_naver">
                            <a onclick="MemberAction.snsLogin('naver', '%2Findex.html')"></a>
                        </li>
                        <li class="btn_apple">
                            <a onclick="MemberAction.snsLogin('apple', '%2Findex.html')"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="KG_footer">
                <div class="ment">
                    <div>로그인까지 한 번에,</div>
                    <div class="icon">구매가 빨라지는 <b>1초회원가입</b> 이란?</div>
                </div>
                <div class="copyright"> dona-d도 <b>1초회원가입</b> 사용 중</div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
          $("#existingMemberBtn").click(function() {
            $(this).parent().addClass("active");
            $("#guestBtn").parent().removeClass("active");
            
            $("#signInForm").removeClass("d-none");
            $("#signUpForm").addClass("d-none");
          });
          
          $("#guestBtn").click(function() {
            $(this).parent().addClass("active");
            $("#existingMemberBtn").parent().removeClass("active");
            
            $("#signUpForm").removeClass("d-none");
            $("#signInForm").addClass("d-none");
          });
        });
      </script>
    @yield('page-script')
</body>

</html>
