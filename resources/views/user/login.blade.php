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

    <title>Member authenticate</title>

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
                    <h2 class="title">Login</h2>
                    <p class="text">Tired of entering your ID and password?<br>Sign up in 1 second and log in easily
                        without inputting anything.</p>
                    <div class="basicBtn"><a href="#" class="btn btnKakao">Kakao 1 second login/sign up</a></div>
                </div>
                <div id="memberLogin" class="contents">
                    <ul id="tabMenu">
                        <li class="active"><a type="button" class="text-decoration-none" id="existingMemberBtn">Are you
                                a member?</a></li>
                        <li class=""><a type="button" class="text-decoration-none" id="guestBtn">Not a
                                member?</a></li>
                    </ul>
                    <div id="formWrap">
                        <form class="" id="signInForm" action="#" method="POST"
                            enctype="multipart/form-data">
                            <div id="normalLogin_id">
                                <div class="inputBox"><input id="member_email" name="member_email" fw-label="email"
                                        class="inputTypeText" placeholder="Enter your email" value=""
                                        type="text">
                                    <div class="inputBox_orderno"></div>
                                    <div class="inputBox_passwd" style="display: block;">
                                        <div class="chk_passwd" style="display: block;"></div>
                                        <input class="pwdField" id="member_password" name="member_password" fw-label="password"
                                            autocomplete="off" value="" type="password"
                                            placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="loginCheckBox"></div>
                                <button type="button" class="btn loginBtn">Login</button>
                                <a href="/order/orderform.html?basket_type=A0000&amp;delvtype=B"
                                    class="btn nomemberBuyBtn" style="display:none">비회원 구매</a>
                                <div class="utilMenu" style="display:block">
                                    {{-- <a href="#">Find your email</a> --}}
                                    <a href="#">Forgot your password?</a>
                                    <a href="#" class="right" style="display:">Join membership</a>
                                </div>
                            </div>
                        </form>
                        <form class="d-none" id="signUpForm" action="#" method="POST"
                            enctype="multipart/form-data">
                            <div id="normalLogin_id">
                                <div class="inputBox"><input id="order_name" name="name" fw-label="name"
                                        class="inputTypeText" placeholder="Enter your name" value=""
                                        type="text">
                                    <div class="inputBox_orderno"><input id="order_id" name="email"
                                            maxlength="30" fw-label="Email" value="" type="text"
                                            placeholder="Enter your email" title="Email"></div>
                                    <div class="inputBox_passwd">
                                        <div class="chk_passwd" style="display: block;"></div>
                                        <input class="pwdField" id="order_password" name="password" fw-label="password"
                                            value="" type="password" placeholder="Enter your password">
                                    </div>
                                    <div class="inputBox_passwd">
                                        <div class="chk_passwd" style="display: block;"></div>
                                        <input class="pwdField" id="order_confirm_password" name="confirm-password" fw-label="password"
                                            value="" type="password" placeholder="Confirm your password">
                                    </div>
                                </div>
                                <div class="loginCheckBox"></div>
                                <button class="btn nomemberLoginBtn" type="button">Sign up</button>
                                <a href="#" class="btn nomemberBuyBtn" style="display:none">Purchase</a>
                                <div class="utilMenu" style="display:none">
                                    {{-- <a href="#">Find your email</a> --}}
                                    <a href="#">Forgot your password?</a>
                                    <a href="#" class="right" style="display:">Join membership</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="snsLogin" class="contents">
                    <ul class="snsLoginBox">
                        <li class="btn_naver">
                            <a href="#"></a>
                        </li>
                        <li class="btn_apple">
                            <a href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="KG_footer">
                <div class="ment">
                    <div>Log in at once,</div>
                    <div class="icon">What is <b>1-second membership registration</b> ?</div>
                </div>
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

    <script>
        $(document).ready(function() {
            $('.chk_passwd').click(function() {
                $('.chk_passwd').toggleClass('active');
                var passwordInput = $('.pwdField');
                if ($(this).hasClass('active')) {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });
        });
    </script>
</body>

</html>
