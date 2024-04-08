@extends('user.index')
@section('title', 'LIVE')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/live.css') }}">
@endsection

@section('content')
    <div class="box-live">
        <div class="live-now">
            <div class="box-content-live-now">
                <p class="time-live-now">{{ $title }}</p>
                <p class="name-live-now">{{ $name }}</p>
                <p class="content-live-now">{{ $content }}</p>
            </div>
            <img width="400px" src="{{ $image }}" alt="">
        </div>
        <p class="title-page-live">View all broadcasts</p>
        <div class="box-live-video">
            @forelse ($videos as $vid)
                <a href="{{ $vid->target_url }}" target="_blank">
                    <div class="item-live-video">
                        <div class="count-user">
                            <img src="{{ asset('assets/images/Icon-user.png') }}" style="width: 12px">
                            <span style="font-size: 10px;color: white;margin-left: 5px">{{ $vid->view }}</span>
                        </div>
                        <img src="{{ $vid->thumbnail }}" class="w-100" style="border-radius: 16px">
                        <p class="title-video">{{ $vid->title }}</p>
                        <p class="content-video">{{ $vid->description }}</p>
                    </div>
                </a>
            @empty
            @endforelse

        </div>
    </div>

    @section('script_page')

    @endsection
