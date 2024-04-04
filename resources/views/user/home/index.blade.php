@extends('user.index')
@section('title','Trang chủ')

@section('style_page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css">
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@stop
{{--content of page--}}
@section('content')
@include('user.home.banner')
@include('user.home.brand')
@include('user.home.category')
@include('user.home.outstanding')
@include('user.home.advertisement')
@include('user.home.styling')
@include('user.home.video')
@include('user.home.official')

@stop
@section('script_page')
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lg-thumbnail/1.1.0/lg-thumbnail.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lg-fullscreen/1.1.0/lg-fullscreen.min.js"></script>
<script src="{{asset('assets/js/home.js')}}"></script>
<script>
    $(document).ready(function () {
            $("#lightgallery").lightGallery();
        });
</script>
@stop