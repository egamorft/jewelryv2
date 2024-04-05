@extends('admin.layout.index')
@section('title', 'Create videos')

@section('style')
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit video <strong>{{ $video->title }}</strong></h1>
            <hr>
            <div class="container">
                <form method="POST" action="{{ route('admin.live.video.update', ['id' => $video->id]) }}"
                    enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="view" class="form-label">View number</label>
                            <input name="view" id="view" type="number" min="0" class="form-control"
                                placeholder="Enter view number" value="{{ old('view', $video->view) }}">
                        </div>
                        <div class="col-md-8">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" id="title" type="text" class="form-control"
                                placeholder="Enter video title" value="{{ old('title', $video->title) }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="targetUrl" class="form-label">Target url</label>
                        <input name="target_url" id="targetUrl" type="text" class="form-control"
                            placeholder="Enter your video target url" value="{{ old('target_url', $video->target_url) }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter video description">{{ old('description', $video->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Video thumbnail</label>
                        <input name="thumbnail" class="form-control" type="file" id="thumbnail" accept="image/*">
                        <img id="thumbnail-preview" class="mt-3" src="{{ asset($video->thumbnail) }}" alt="avt" width="200">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $('#thumbnail').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbnail-preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
