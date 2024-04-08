@extends('admin.layout.index')
@section('title', 'Create product')

@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Create product</h1>
            <hr>
            <div class="container">
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product name</label>
                        <input name="name" id="product_name" type="text" class="form-control"
                            placeholder="Enter product name" value="{{ old('name') }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="product_price" class="form-label">Price</label>
                            <input name="price" id="product_price" type="number" class="form-control"
                                placeholder="Enter product price" value="{{ old('price') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="product_stock" class="form-label">Current stock</label>
                            <input name="current_stock" id="product_stock" type="number" min="0"
                                class="form-control" placeholder="Enter current stock"
                                value="{{ old('current_stock', 0) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="product_min_qty" class="form-label">Min purchase quantity</label>
                            <input name="min_qty" id="product_min_qty" type="number" min="1" class="form-control"
                                placeholder="Enter min purchase quantity" value="{{ old('min_qty', 1) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="product_discount" class="form-label">Discount</label>
                            <input name="discount" id="product_discount" type="number" class="form-control"
                                placeholder="Enter product discount" value="{{ old('discount', 0) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="product_discount_type" class="form-label">Discount type</label>
                            <select name="discount_type" class="form-select" id="product_discount_type"
                                aria-label="Default select example">
                                <option value="amount" selected>Amount</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-switch" style="margin-top: 2rem">
                                <input class="form-check-input" name="installment" type="checkbox" id="installment"
                                    value="1">
                                <label class="form-check-label" for="installment">Interest-free installment</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="categorySelector" class="form-label">Categories</label>
                        <select class="form-select" id="categorySelector" name="categories[]" multiple>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}" {{ in_array($cate->id, old('categories', [])) ? 'selected' : '' }}>{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_n_notice" class="form-label">Delivery & Notice</label>
                        <textarea name="delivery_n_notice" class="form-control" id="delivery_n_notice" rows="3"
                            placeholder="Enter delivery & notice">{{ old('delivery_n_notice') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="spec_n_details" class="form-label">Spec & Details</label>
                        <textarea name="spec_n_details" class="form-control" id="spec_n_details" rows="3"
                            placeholder="Enter spec & details">{{ old('spec_n_details') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exchange" class="form-label">A/S & Exchange</label>
                        <textarea name="exchange" class="form-control" id="exchange" rows="3" placeholder="Enter a/s & exchange">{{ old('exchange') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photos" class="form-label">Product photos</label>
                        <input name="photos[]" class="form-control" type="file" id="photos" accept="image/*"
                            multiple>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Product thumbnail</label>
                        <input name="thumbnail_img" class="form-control" type="file" id="thumbnail"
                            accept="image/*">
                        <img id="thumbnail-preview" class="mt-3" src="" width="200">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="published" type="checkbox" id="published"
                                value="1" checked>
                            <label class="form-check-label" for="published">Is published?</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categorySelector').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
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
