@extends('admin.layout.index')
@section('title', 'Category list')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Footer category list</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i
                        class="fa-solid fa-rotate"></i>Add more category</a>
            </div>

            <table class="table" id="tableListCategories">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Slug</th>
                        <th scope="col" class="text-center">Level</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $cate)
                        <tr id="category-{{ $cate->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $cate->name }}
                            </td>
                            <td class="text-center">
                                {{ $cate->slug }}
                            </td>
                            <td class="text-center">
                                @if (!$cate->parent_id)
                                    0
                                @else
                                    1
                                @endif
                            </td>
                            <td class="text-center">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editCategory{{ $cate->id }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteCategory({{ $cate->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add category modal -->
        <div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.footer.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryLabel">Add category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-category-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="add-category-name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="add-category-slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="add-category-slug" name="slug"
                                    value="{{ old('slug') }}">
                            </div>
                            <div class="mb-3">
                                <label for="addCategoryParentSelector" class="form-label">Categories parent: </label>
                                <select class="form-select categoryParentSelector" id="addCategoryParentSelector"
                                    name="parent_id">
                                    <option value="0" selected>No parent</option>
                                    @foreach ($categories as $cate)
                                        @if (!$cate->parent_id)
                                            <option value="{{ $cate->id }}">
                                                {{ $cate->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($categories as $key => $cate)
            <!-- Edit category modal -->
            <div class="modal fade" id="editCategory{{ $cate->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.footer.category.update', ['id' => $cate->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryLabel">Edit category {{ $cate->slug }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-category-name-{{ $cate->id }}" class="form-label">Name</label>
                                    <input type="text" class="form-control edit-category-name"
                                        id="edit-category-name-{{ $cate->id }}" name="name"
                                        value="{{ old('name', $cate->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-category-slug-{{ $cate->id }}" class="form-label">Slug</label>
                                    <input type="text" class="form-control edit-category-slug"
                                        id="edit-category-slug-{{ $cate->id }}" name="slug"
                                        value="{{ old('slug', $cate->slug) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="categoryParentSelector" class="form-label">Categories parent: </label>
                                    <select class="form-select categoryParentSelector" name="parent_id">
                                        <option value="0">No parent</option>
                                        @foreach ($categories as $pCate)
                                            @if (!$pCate->parent_id && $pCate->id != $cate->id)
                                                <option value="{{ $pCate->id }}"
                                                    {{ $pCate->id == $cate->parent_id ? 'selected' : '' }}>
                                                    {{ $pCate->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableListCategories').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.categoryParentSelector').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
    <script>
        function removeDiacritics(str) {
            return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        }

        function slugify(str) {
            return removeDiacritics(str)
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-z0-9-]/g, '');
        }

        $(document).ready(function() {
            $("#add-category-name").blur(function() {
                var nameValue = $(this).val();
                var slugValue = slugify(nameValue);
                $("#add-category-slug").val(slugValue);
            });

            $(".edit-category-name").blur(function() {
                var nameValue = $(this).val();
                var slugValue = slugify(nameValue);

                var slugInput = $(this).closest('.modal-body').find('.edit-category-slug');
                slugInput.val(slugValue);
            });
        });
    </script>
    <script>
        function deleteCategory(id) {
            var categoryTr = $('#category-' + id);
            if (confirm("Are you sure you want to delete this category?")) {
                $.ajax({
                    url: '{{ route('admin.footer.category.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            categoryTr.remove();
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
