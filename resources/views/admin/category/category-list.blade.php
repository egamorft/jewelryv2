@extends('admin.layout.index')
@section('title', 'Category list')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Category list</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-outline-primary"><i
                        class="fa-solid fa-rotate"></i>Add more category</a>
            </div>

            <table class="table" id="tableListCategories">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Slug</th>
                        <th scope="col" class="text-center">Popular</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($videos as $key => $vid)
                        <tr id="video-{{ $vid->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $vid->view }}
                            </td>
                            <td class="text-center">
                                <img src="{{ asset($vid->thumbnail) }}" alt="avt" width="160">
                            </td>
                            <td class="text-center">
                                {{ $vid->title }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.live.video.show', ['id' => $vid->id]) }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteVideo({{ $vid->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableListCategories').DataTable();
        });
    </script>
    <script>
        // function deleteVideo(id) {
        //     var videoTr = $('#video-' + id);
        //     if (confirm("Are you sure you want to delete this video?")) {
        //         $.ajax({
        //             url: '{{ route('admin.live.video.destroy', ':id') }}'.replace(':id', id),
        //             type: 'DELETE',
        //             headers: {
        //                 'X-CSRF-TOKEN': `{{ csrf_token() }}`
        //             },
        //             success: function(response) {
        //                 if (response.error == 0) {
        //                     toastr.success(response.message);
        //                     videoTr.remove();
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 toastr.error(xhr.responseJSON.message);
        //             }
        //         });
        //     }
        // }
    </script>
@endsection
