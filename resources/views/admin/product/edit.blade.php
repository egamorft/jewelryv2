@extends('admin.layout.index')
@section('title', 'Edit product')

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
            <h1 class="h3 mb-4 text-gray-800">Edit product <strong>{{ $product->title }}</strong></h1>
            <hr>
            <div class="container">
                <form method="POST" action="{{ route('admin.product.update', ['id' => $product->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product name</label>
                        <input name="name" id="product_name" type="text" class="form-control"
                            placeholder="Enter product name" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="product_price" class="form-label">Price</label>
                            <input name="price" id="product_price" type="number" class="form-control"
                                placeholder="Enter product price" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="product_stock" class="form-label">Current stock</label>
                            <input name="current_stock" id="product_stock" type="number" min="0"
                                class="form-control" placeholder="Enter current stock"
                                value="{{ old('current_stock', $product->current_stock) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="product_min_qty" class="form-label">Min purchase quantity</label>
                            <input name="min_qty" id="product_min_qty" type="number" min="1" class="form-control"
                                placeholder="Enter min purchase quantity" value="{{ old('min_qty', $product->min_qty) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="product_discount" class="form-label">Discount</label>
                            <input name="discount" id="product_discount" type="number" class="form-control"
                                placeholder="Enter product discount" value="{{ old('discount', $product->discount) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="product_discount_type" class="form-label">Discount type</label>
                            <select name="discount_type" class="form-select" id="product_discount_type"
                                aria-label="Default select example">
                                <option value="amount" {{ $product->discount_type == 'amount' ? 'selected' : '' }}>Amount
                                </option>
                                <option value="percent" {{ $product->discount_type == 'percent' ? 'selected' : '' }}>Percent
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="product_discount_end" class="form-label">Discount end</label>
                            <input id="datetimepicker" class="form-control" name="discount_end" type="text"
                                value="{{ old('discount_end', $product->discount_end) }}">
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-switch" style="margin-top: 2rem">
                                <input class="form-check-input" name="installment" type="checkbox" id="installment"
                                    value="1" {{ $product->installment ? 'checked' : '' }}>
                                <label class="form-check-label" for="installment">Interest-free installment</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="categorySelector" class="form-label">Categories</label>
                        <select class="form-select" id="categorySelector" name="categories[]" multiple>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}"
                                    {{ in_array($cate->id, old('categories', $selectedCategories)) ? 'selected' : '' }}>
                                    {{ $cate->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_n_notice" class="form-label">Delivery & Notice</label>
                        <textarea name="delivery_n_notice" class="form-control" id="delivery_n_notice" rows="3"
                            placeholder="Enter delivery & notice">{{ old('delivery_n_notice', $product->delivery_n_notice) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="spec_n_details" class="form-label">Spec & Details</label>
                        <textarea name="spec_n_details" class="form-control" id="spec_n_details" rows="3"
                            placeholder="Enter spec & details">{{ old('spec_n_details', $product->spec_n_details) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exchange" class="form-label">A/S & Exchange</label>
                        <textarea name="exchange" class="form-control" id="exchange" rows="3" placeholder="Enter a/s & exchange">{{ old('exchange', $product->exchange) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photos" class="form-label">Product photos</label>
                        <input name="photos[]" class="form-control" type="file" id="photos" accept="image/*"
                            multiple>
                        <div id="photosGallery">
                            @if (!empty(json_decode($product->photos)))
                                @foreach (json_decode($product->photos) as $photo)
                                    <img class="mt-3" src="{{ $photo }}" width="200">
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Product thumbnail</label>
                        <input name="thumbnail_img" class="form-control" type="file" id="thumbnail"
                            accept="image/*">
                        <img id="thumbnail-preview" class="mt-3" src="{{ $product->thumbnail_img }}" width="200">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="published" type="checkbox" id="published"
                                value="1" {{ $product->published ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">Is published?</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exchange" class="form-label">Product Information</label>
                        <textarea name="information" id="information" required
                                                  class="ckeditor">{!! $product->information !!}</textarea>
                    </div>

                    <div class="card mb-3 mt-5">
                        <div class="card-header bg-info text-white">
                            Add attribute
                        </div>
                        <div class="card-body p-0">
                            @foreach($product_attribute as $key => $item)
                                @php $product_value = \App\Models\ProductValueModel::where('product_attribute_id', $item->id)->get(); @endphp
                                <div class="mt-3 border-bottom data-variant pb-3">
                                    <input value="{{$item->id}}" hidden name="variant[{{$key}}][attribute_id]">
                                    <div class="row m-0">
                                        <div class="col-lg-4 p-1">
                                            <input type="text" name="variant[{{$key}}][name]" class="form-control"
                                                   value="{{$item->name}}"
                                                   placeholder="Attribute type name" required>
                                        </div>
                                        <div class="col-lg-3 p-1">
                                            <button type="button" class="btn btn-success btn-add-attribute form-control">
                                                <i class="bi bi-plus-lg"></i> Add attributes
                                            </button>
                                        </div>
                                        <div class="col-lg-3 p-1">
                                            <button type="button"
                                                    class="btn btn-primary btn-add-type-attribute form-control"><i
                                                    class="bi bi-plus-lg"></i> Add attribute type name
                                            </button>
                                        </div>
                                        @if($key > 0)
                                            <div class="col-lg-2 p-1">
                                                <a class="btn btn-danger btn-delete-name"
                                                   href="{{url('/admin/product/delete-type/'.$item->id)}}">
                                                    <i class="bi bi-trash"></i> Xóa</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="list-size">
                                        @foreach($product_value as $k => $value)
                                            <div class="row m-0">
                                                <input value="{{$value->id}}" hidden
                                                       name="variant[{{$key}}][data][{{$k}}][value_id]">
                                                <div class="col-lg-3 p-1">
                                                    <input type="text" name="variant[{{$key}}][data][{{$k}}][name]"
                                                           class="form-control name_attribute" placeholder="attribute name"
                                                           required value="{{$value->name}}">
                                                </div>
                                                <div class="col-lg-3 p-1">
                                                    <input name="variant[{{$key}}][data][{{$k}}][current_stock]" type="text"
                                                           class="form-control current_stock format-currency"
                                                           value="{{$value->current_stock}}"
                                                           placeholder="Current stock">
                                                </div>
                                                <div class="col-lg-3 p-1">
                                                    <input name="variant[{{$key}}][data][{{$k}}][cost]" type="text"
                                                           class="form-control cost format-currency"
                                                           value="{{$value->cost}}"
                                                           placeholder="Cost">
                                                </div>
                                                <div class="col-lg-3 p-1">
                                                    <input name="variant[{{$key}}][data][{{$k}}][price]"
                                                           type="text"
                                                           class="form-control price format-currency"
                                                           value="{{$value->price}}"
                                                           placeholder="Price">
                                                </div>
                                                @if($k > 0)
                                                    <div class="col-lg-2 p-1">
                                                        <a href="{{url('admin/product/delete-name/'.$value->id)}}"
                                                           class="btn btn-danger btn-delete-color">
                                                            <i class="bi bi-trash"></i> Xóa</a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script src="{{asset('assets/admin/js/create_product.js')}}"></script>
    <script>
         CKEDITOR.replace('information', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
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
                step: 30
            });
        });
        $('a.btn-delete-name').confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete this data?',
        buttons: {
            ok: {
                text: 'Delete',
                btnClass: 'btn-danger',
                action: function(){
                    location.href = this.$target.attr('href');
                }
            },
            close: {
                text: 'Cancel',
                action: function () {}
            }
        }
    });
    $('a.btn-delete-color').confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete this data?',
        buttons: {
            ok: {
                text: 'Delete',
                btnClass: 'btn-danger',
                action: function(){
                    location.href = this.$target.attr('href');
                }
            },
            close: {
                text: 'Cancel',
                action: function () {}
            }
        }
    });
    </script>
    <script>
        $(document).ready(function() {
            $('#categorySelector').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#photos').change(function() {
                // Get the file input element and its selected files
                const input = $(this);
                const files = input[0].files;

                // Get the target element to append the new images
                const gallery = $('#photosGallery');

                // Clear the existing images in the gallery
                gallery.empty();

                // Loop through the selected files and display them as images
                $.each(files, function(index, file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img class="mt-3" width="200">');
                        img.attr('src', e.target.result);
                        gallery.append(img);
                    };
                    reader.readAsDataURL(file);
                });
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
