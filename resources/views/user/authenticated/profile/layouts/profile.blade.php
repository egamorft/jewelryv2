@extends('user.index')
@section('title', 'My shop')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    @yield('pages_style')
@endsection

@section('content')
    <div id="wrap">
        <div id="container">
            <div id="contents" class="position-relative">
                @switch(Route::currentRouteName())
                    @case('profile.index')
                        @php
                            $customClass = 'myshop-index';
                        @endphp
                    @break

                    @case('profile.order')
                        @php
                            $customClass = 'myshop-order-list';
                        @endphp
                    @break

                    @case('profile.benefit')
                        @php
                            $customClass = 'donad-membership';
                        @endphp
                    @break

                    @default
                        @php
                            $customClass = '';
                        @endphp
                @endswitch
                <div id="drmvsn-basic-wrap" class="{{ $customClass }}">
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
    @yield('pages_script')
@endsection
