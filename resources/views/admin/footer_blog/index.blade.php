@extends('admin.layout.index')
@section('title', 'Footer blog list')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Footer blog list</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.footer.blog.create') }}" type="button" class="btn btn-outline-primary"><i
                        class="fa-solid fa-rotate"></i>Add more blog</a>
            </div>

            <table class="table" id="tableListBlogs">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $blog)
                        <tr id="blog-{{ $blog->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $blog->title }}
                            </td>
                            <td class="text-center">
                                {{ $blog->categories->name ?? '' }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.footer.blog.edit', ['id' => $blog->id]) }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteBlog({{ $blog->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableListBlogs').DataTable();
        });
    </script>

    <script>
        function deleteBlog(id) {
            var blogTr = $('#blog-' + id);
            if (confirm("Are you sure you want to delete this blog?")) {
                $.ajax({
                    url: '{{ route('admin.footer.blog.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            blogTr.remove();
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            }
        }
    </script>
@endsection
