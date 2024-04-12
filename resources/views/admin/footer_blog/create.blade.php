@extends('admin.layout.index')
@section('title', 'Create blog')

@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Create blog</h1>
            <hr>
            <div class="container">
                <form method="POST" action="{{ route('admin.footer.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="blog_title" class="form-label">Blog title</label>
                        <input name="title" id="blog_title" type="text" class="form-control"
                            placeholder="Enter blog title" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="categorySelector" class="form-label">Category</label>
                        <select class="form-select" id="categorySelector" name="category_id">
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->id == old('categories') ? 'selected' : '' }}>
                                    {{ $cate->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exchange" class="form-label">Blog description</label>
                        <textarea name="description" id="description" required class="ckeditor">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('admin.ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height: 500,
        });
        $(function() {
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);

            var currentDate = tomorrow.toISOString().split('T')[0];
            var currentTime = tomorrow.getHours() + ':' + tomorrow.getMinutes();

            $("#datetimepicker").datetimepicker({
                minDate: tomorrow,
                defaultDate: tomorrow,
                format: "Y-m-d H:i",
                step: 30,
                value: currentTime
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#categorySelector').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
@endsection
