@extends('admin.layout.index')
@section('title', 'Thumbnail content')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/live.css') }}">
@endsection

@section('main')
    <div class="box-live mb-5">
        <div class="live-now">
            <div class="box-content-live-now">
                <p id="title-live-now" class="time-live-now" contenteditable>{{ $title }}</p>
                <p id="name-live-now" class="name-live-now" contenteditable>{{ $name }}</p>
                <p id="content-live-now" class="content-live-now" contenteditable>{{ $content }}</p>
            </div>
            <div>
                <img width="400px" id="live-image" src="{{ $image }}" alt="{{ $title }}">
                <input class="mt-3" type="file" id="image-live-now" name="image" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-5">
        <button type="button" id="save-button" class="btn btn-outline-primary">
            Save changes
        </button>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#image-live-now').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#live-image').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            });

            $('#save-button').click(function() {
                var title = $('#title-live-now').text();
                var name = $('#name-live-now').text();
                var content = $('#content-live-now').text();
                var image = $('#image-live-now')[0].files[0];

                var formData = new FormData();
                formData.append('title', title);
                formData.append('name', name);
                formData.append('content', content);
                formData.append('image', image);

                $.ajax({
                    url: '{{ route('admin.live.save.content') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
