@extends('user.index')
@section('title', 'Detail Post')

@section('style_page')
    <style>
      .box-blog{
         width: 60%;
         max-width: 1560px;
         margin: 0 auto;
         margin-top: 80px;
         padding-bottom: 50px
      }
      .title-blog{
         text-align: center;
         color: #000000;
         font-size: 24px;
         font-weight: 700;
         padding: 20px 0
      }
      .contnet-blog{
         font-size: 14px;
         color: #000000;
      }
      .contnet-blog img{
         max-width: 100%;
         object-fit: cover
      }
      @media (max-width: 1260px) {
         .box-blog{
            width: 75%;
         }
      }
      @media (max-width: 640px) {
         .box-blog{
            width: 90%;
         }
         .title-blog{
         font-size: 16px;
         padding:  0px;
         margin-top: 10px
      }
      }
    </style>
@endsection

@section('content')
    <div class="box-blog">
       <p class="title-blog">{{$post->title}}</p>
       <div class="contnet-blog mb-3">{{$post->describe}}</div>
       <div class="contnet-blog">{!! $post->content !!}</div>
    </div>

