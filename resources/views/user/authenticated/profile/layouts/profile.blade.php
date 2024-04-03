@extends('user.index')
@section('title', 'My shop')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/utility.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/original-style.css') }}">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div id="wrap">
        <div id="container">
            <div id="contents" class="position-relative">

                <div id="drmvsn-basic-wrap" class="myshop-index">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="current">My shop</li>
                        </ul>
                    </div>
                    <div class="title-area mobile-only">
                        <span class="mobile-only go-back"></span>
                        <h2>My shop</h2>
                    </div>
                    <div class="flex flex-wrap">
                        <!-- sidebar -->
                        @include('user.authenticated.profile.layouts.sidebar')
                        <!-- sidebar -->

                        <!-- content -->
                        @yield('my-shop-content')
                        <!-- content -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script_page')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#history_start_date").datepicker();
            $("#history_end_date").datepicker();
        });
    </script>
@endsection
