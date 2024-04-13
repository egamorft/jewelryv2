@extends('admin.layout.index')
@section('title', 'Post Brand')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Brand</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{url('admin/save-brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{@$post->id}}" name="post_id" hidden>
                    <div class="row">
                        <div class="col-3">Title :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" type="text" value="{{@$post->title}}" maxlength="255" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">Describe :</div>
                        <div class="col-8">
                           <textarea name="describe" class="form-control" maxlength="255" required rows="4">{{@$post->describe}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                     <label for="exchange" class="form-label">Content: </label>
                     <textarea name="content" id="content" required
                                               class="ckeditor">{!! @$post->content !!}</textarea>
                 </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-3"></div>
                        <div class="col-8 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                   
                    </div>
                </form>
                </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 500,
        });
</script>
@endsection
