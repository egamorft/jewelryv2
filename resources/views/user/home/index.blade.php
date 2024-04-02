@extends('user.index')
@section('title','Trang chủ')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@stop
{{--content of page--}}
@section('content')
@include('user.home.banner')
@include('user.home.brand')
@include('user.home.category')
@include('user.home.outstanding')
@include('user.home.styling')
@include('user.home.official')

@stop
@section('script_page')
<script src="{{asset('assets/js/home.js')}}"></script>
@stop