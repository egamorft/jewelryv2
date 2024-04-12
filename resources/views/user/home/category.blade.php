<div class="main-nav-with-img-banner">
    <div>
        @foreach ($topPopular as $key => $cate)
            <div class="">
                <a href="{{ $cate->slug }}" target="_self">
                    <span class="nav-list {{ $key % 2 !== 0 ? 'left' : '' }}">{{ $cate->name }}<span
                            class="nav-img"><img class="lazy entered loaded" src="{{ $cate->thumbnail }}"
                                alt="HERITAGE LINE"></span></span>
                </a>
            </div>
        @endforeach
    </div>
</div>

@if (count($collection) > 0)
    <div class="box-collection">
        @foreach ($collection as $item_collection)
            <div class="item-collection">
                <img src="{{ asset($item_collection->src) }}" class="img-collection" loading="lazy">
                <div>
                    <p class="title-collection">{{ $item_collection->title }}</p>
                    <div class="content-collection">{{ $item_collection->describe }}</div>
                    <a href="{{ url('detail-collection', $item_collection->id) }}" class="link-collection">Shop now_</a>
                </div>
            </div>
        @endforeach
    </div>
@endif
