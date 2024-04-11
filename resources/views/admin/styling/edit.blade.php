@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit styling</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{url('admin/styling/update',$styling->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">Title :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" type="text" value="{{$styling->title}}" maxlength="255" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                     <div class="col-3">Describe :</div>
                     <div class="col-8">
                        <textarea type="text" class="form-control  text-sm" name="describe" rows="3" maxlength="255" class="ckeditor">{{$styling->describe}}</textarea>
                     </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-3">Content :</div>
                  <div class="col-8">
                     <textarea type="text" class="form-control  text-sm" name="content" rows="6" maxlength="255" class="ckeditor" required>{{$styling->content}}</textarea>
                  </div>
              </div>
                    <div class="row mt-3">
                        <div class="col-3">ON/OFF :</div>
                        <div class="col-8">
                            <label class="switch">
                                <input type="checkbox" @if($styling->display == 1) checked @endif  name="display">
                                <span class="slider round">ON</span>
                            </label>
                        </div>
                    </div>
                    <div class="card mt-3">
                     <div class="card-header bg-info text-white">
                         Image
                     </div>
                     <div class="card-body">
                        <div class="image-uploader image_product has-files mt-2">
                            <div class="uploaded">
                                @foreach($styling_image as $value)
                                    <div class="uploaded-images">
                                        <img src="{{asset($value->src)}}">
                                        <button type="button" value="{{$value->id}}" class="delete__image"><i
                                                class="bi bi-x"></i></button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="card mt-3">
                  <div class="card-header bg-info text-white">
                     Update product images
                  </div>
                  <div class="card-body">
                      <div class="card-body">
                          <label class="mt-2 mb-2"><i class="fa fa-upload"></i> Select or drag the photo into the frame below</label>
                          <div class="input-image-product">
                          </div>
                      </div>
                  </div>
              </div>
                 <h5>Related products</h5>
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive table-responsive-lg">
                                    <table class="table data-list-view table-sm">
                                        <thead>
                                        <tr class="text-center">
                                            <td scope="col">Image</td>
                                            <td scope="col">Product Name</td>
                                            <td> Operation</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($related as $value)
                                                <tr class="text-center" style="border-top: 2px solid #e8e8e8">
                                                    <td>
                                                        <img class="" style="width: 50px; height: auto"
                                                             src="{{$value->product->thumbnail_img}}">
                                                    </td>
                                                    <td style="padding-top: 20px">{{$value->product->name}}</td>
                                                    <td style="padding-top: 20px">
                                                        <button type="button" class="btn btn-danger"
                                                                onclick="deleteRelated({{$value->product_id}})"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        <tbody class="item_product">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-3"></div>
                        <div class="col-8 ">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('admin.styling.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" hidden>
                    </div>
                </form>
                <div class="p-3"
                         style="border-radius: 5px;box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);background-color: white">
                        <div class="d-flex justify-content-between align-items-center mb-3 ">
                            <h4>List of products</h4>
                            <div class="col-sm-6">
                                <div class="search">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-label-group position-relative has-icon-left mb-0"
                                                 style="background: #FFFFFF">
                                                <input type="text" id="search" class="form-control" name="search"
                                                       placeholder="Enter the product name or product code"
                                                       style="color: black">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive table-responsive-lg">
                                    <table class="table data-list-view table-sm">
                                        <thead>
                                        <tr class="text-center">
                                            <td scope="col">Image</td>
                                            <td scope="col">Product Name</td>
                                            <td> Operation</td>
                                        </tr>
                                        </thead>
                                        <tbody class="table_product">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
<script src="{{asset('assets/admin/js/input_file.js')}}" type="text/javascript"></script>
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('button.delete__image').confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete this record?',
        buttons: {
            ok: {
                text: 'Delete',
                btnClass: 'btn-danger',
                action: function(){
                    let data = {};
                    data['id'] = this.$target.attr("value");
                    $.ajax({
                        url: window.location.origin + '/admin/styling/delete-img',
                        data: data,
                        dataType: 'json',
                        type: 'post',
                        success: function (data) {
                            if (data.status){
                                location.reload();
                            }
                        }
                    });
                }
            },
            close: {
                text: 'Cancel',
                action: function () {}
            }
        }
    });

    search();

    function search(query = '') {
        $.ajax({
            url: window.location.origin + '/admin/styling/item_product/search',
            method: 'GET',
            data: {query: query},
            dataType: 'json',
            success: function (data) {
                $('.table_product').html(data.table_data);
            }
        });
    }

    $(document).on('keyup', '#search', function () {
        var query = $('#search').val();
        search(query);
    }); 

    let arr = [];

    function idSP(id) {
        arr.push(id);
        $.ajax({
            url: '{{url('admin/styling/item_product')}}',
            method: 'GET',
            data: {data: arr},
            dataType: 'json',
            success: function (data) {
                $('.item_product').html(data.table_data);
            }
        });
    }

    function deleteSP(id) {
        for (let i = 0; i < arr.length; i++) {
            if (arr[i] === id) {
                arr.splice(i, 1);
            }
        }
        $.ajax({
            url: '{{url('admin/styling/item_product/delete')}}',
            method: 'GET',
            data: {data: arr},
            dataType: 'json',
            success: function (data) {
                if (data.status == true) {
                    $('.item_product').html(data.table_data);
                } else {
                    location.reload();
                }
            }
        });
    }

    function deleteRelated(id) {
        $.ajax({
            url: '{{url('admin/styling/item_product/delete_related')}}',
            method: 'GET',
            data: {id: id},
            dataType: 'json',
            success: function (data) {
                if (data.status == true) {
                    location.reload();
                }
            }
        });
    }
</script>
@endsection
