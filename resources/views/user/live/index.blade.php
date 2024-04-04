@extends('user.index')
@section('title','LIVE')

@section('style_page')
<link rel="stylesheet" href="{{asset('assets/css/live.css')}}">
@stop

@section('content')
<div class="box-live">
   <div class="live-now">
      <div class="box-content-live-now">
         <p class="time-live-now">2024 03.21 (Thursday), 6:00PM</p>
         <p class="name-live-now">Donna&D Live ♥</p>
         <p class="content-live-now">Live has ended</p>
      </div>
      <img src="{{asset('assets/images/imagelive.png')}}" alt="">
   </div>
   <p class="title-page-live">View all broadcasts</p>
   <div class="box-live-video">
      @for ($i = 0; $i < 16; $i++)
         <div class="item-live-video">
            <div class="count-user">
               <img src="{{asset('assets/images/Icon-user.png')}}" style="width: 12px">
               <span style="font-size: 10px;color: white;margin-left: 5px">1267</span>
            </div>
            <img src="{{asset('assets/images/image-live-video.png')}}" class="w-100" style="border-radius: 16px">
            <p class="title-video">Donna&D Live 3/20 (TUE)</p>
            <p class="content-video">Spoiling Black Tennis Bracelet Nice Leather Bracelet</p>
         </div>
      @endfor
        
   </div>
</div>

@section('script_page')

@stop