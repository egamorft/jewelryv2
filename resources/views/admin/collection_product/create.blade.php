@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create Product Collection</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('admin.product-collection.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 mb-5">
                        <label class="col-sm-3 col-form-label">Collection</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="collection"
                                    aria-label="Default select example">
                                    @foreach ($collection as $item)
                                        <option class="bg-info" value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <h4>List of products</h4>
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
                            <a href="{{url('admin/product-collection/index/all')}}" class="btn btn-danger">Cancel</a>
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
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    search();

    function search(query = '') {
        $.ajax({
            url: window.location.origin + '/admin/product-collection/item_product/search',
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
                url: '{{url('admin/product-collection/item_product')}}',
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
                url: '{{url('admin/product-collection/item_product/delete')}}',
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
