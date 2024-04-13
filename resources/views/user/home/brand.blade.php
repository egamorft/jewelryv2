@if(isset($post_brand))
<div class="box-brand">
<p class="title-brand">{{$post_brand->title}}</p>
<p class="content-brand w-50">{{$post_brand->describe}}</p>
<a href="{{url('detail-post',$post_brand->id)}}" class="link-brand">ABOUT BRAND</a>
</div>
@endif