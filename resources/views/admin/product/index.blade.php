@extends('admin.layout.index')
@section('title', 'Product list')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Product list</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-outline-primary"><i
                        class="fa-solid fa-rotate"></i>Add more product</a>
            </div>

            <table class="table" id="tableListProducts">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Thumbnail</th>
                        <th scope="col" class="text-center">Unit price</th>
                        <th scope="col" class="text-center">In stock</th>
                        <th scope="col" class="text-center">Discount</th>
                        <th scope="col" class="text-center">Rating</th>
                        <th scope="col" class="text-center">Is published?</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $pro)
                        <tr id="product-{{ $pro->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $pro->name }}
                            </td>
                            <td class="text-center">
                                <img src="{{ asset($pro->thumbnail_img) }}" alt="avt" width="160">
                            </td>
                            <td class="text-center">
                                {{ number_format($pro->price, 0, '.', ',') }} đ
                            </td>
                            <td class="text-center">
                                {{ $pro->current_stock }}
                            </td>
                            <td class="text-center">
                                @php
                                    if ($pro->discount_type == 'percent') {
                                        echo $pro->discount . '%';
                                    } else {
                                        echo number_format($pro->discount, 0, '.', ',') . 'đ';
                                    }
                                @endphp
                            </td>
                            <td class="text-center">
                                {{ $pro->rating }}
                            </td>
                            <td class="text-center">
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox"
                                        {{ $pro->published ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.product.edit', ['id' => $pro->id]) }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteProduct({{ $pro->id }})" class="btn btn-danger"><i
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
            $('#tableListProducts').DataTable();
        });
    </script>
    <script>
        function deleteProduct(id) {
            var productTr = $('#product-' + id);
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    url: '{{ route('admin.product.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            productTr.remove();
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
