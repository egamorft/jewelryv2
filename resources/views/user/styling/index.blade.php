@extends('user.index')
@section('title','Styling')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/styling.css')}}">
@stop

@section('content')
<div class="box-styling">
   <p class="title-styling-header">STYLING</p>
   <div class="box-content-styling">
      @for ($i = 0; $i < 24; $i++)
      <div>
         <img src="{{asset('assets/images/imagesp6.png')}}" class="w-100">
            <p class="title-styling">DONA Solitaire Diamond Ring styling</p>
            <p class="content-styling">Solitaire ring with a timeless design that you can keep for a lifetime, 1 carat, 5-quarter size styling.</p>
      </div>
      @endfor

   </div>
</div>

@section('script_page')

@stop