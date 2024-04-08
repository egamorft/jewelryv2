@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create advertisement</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('admin.advertisement.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">Title :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" type="text" maxlength="255" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">Link :</div>
                        <div class="col-8">
                            <input class="form-control" name="link" type="text">
                        </div>
                    </div>
                    <div class="row mt-3 mb-5">
                        <div class="col-3">Image :</div>
                        <div class="col-8">
                            <div class="form-control position-relative" style="padding-top: 50%">
                                <button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                    <i style="font-size: 30px" class="bi bi-download"></i>
                                </button>
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
                                        <tbody class="item_product">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-3"></div>
                        <div class="col-8 ">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{route('admin.advertisement.index')}}" class="btn btn-danger">Cancel</a>
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
<script>
     let parent;
        $(document).on("click", ".select-image", function () {
           $('input[name="file"]').click();
           parent = $(this).parent();
        });
        $('input[type="file"]').change(function(e){
          imgPreview(this);
        });
        function imgPreview(input) {
            let file = input.files[0];
            let mixedfile = file['type'].split("/");
            let filetype = mixedfile[0];
            if(filetype == "image"){
                let reader = new FileReader();
                reader.onload = function(e){
                    $("#preview-img").show().attr("src", );
                    let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                        '<button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>'+
                        '<img src="'+e.target.result+'" class="w-100 h-100" style="object-fit: cover">' +
                        '</div>';
                    parent.html(html);
                }
                reader.readAsDataURL(input.files[0]);
            }else{
                alert("Invalid file type");
            }
        }
        $(document).on("click", "button.clear", function () {
            $(".div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            parent.html(html);
            $('input[type="file"]').val("");
        });
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    search();

    function search(query = '') {
        $.ajax({
            url: window.location.origin + '/admin/advertisement/item_product/search',
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
                url: '{{url('admin/advertisement/item_product')}}',
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
                url: '{{url('admin/advertisement/item_product/delete')}}',
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
</script>
@endsection
