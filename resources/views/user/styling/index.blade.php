@extends('user.index')
@section('title','Styling')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/styling.css')}}">
@stop

@section('content')
<div class="box-styling">
   <p class="title-styling-header">STYLING</p>
   <div class="box-content-styling">
      @foreach ($styling as $val_styling)
      <a href="{{url('detail-styling',$val_styling->id)}}">
         <img src="{{asset($val_styling->src)}}" class="w-100">
            <p class="title-styling">{{$val_styling->title}}</p>
            <p class="content-styling">{{$val_styling->describe}}</p>
      </a>
      @endforeach
   </div>
   @if(count($styling) == 42)
   <div class="d-flex justify-content-center mt-5">
      <a class="btn-list-shop" id="load-more-styling" data-offset="42">List</a>
   </div>
@endif
</div>

@section('script_page')
<script src="{{asset('assets/js/styling.js')}}"></script>
@stop