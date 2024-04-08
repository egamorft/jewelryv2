@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create styling</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('admin.styling.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">Title :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" type="text" maxlength="255" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                     <div class="col-3">Describe :</div>
                     <div class="col-8">
                        <textarea type="text" class="form-control  text-sm" name="describe" rows="3" maxlength="255" class="ckeditor" required></textarea>
                     </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-3">Content :</div>
                  <div class="col-8">
                     <textarea type="text" class="form-control  text-sm" name="content" rows="6" maxlength="255" class="ckeditor" required></textarea>
                  </div>
              </div>
                    <div class="row mt-3">
                        <div class="col-3">ON/OFF :</div>
                        <div class="col-8">
                            <label class="switch">
                                <input type="checkbox" checked name="display">
                                <span class="slider round">ON</span>
                            </label>
                        </div>
                    </div>
                    <div class="card mt-3">
                     <div class="card-header bg-info text-white">
                         Image
                     </div>
                     <div class="card-body">
                         <label class="mt-2 mb-2"><i class="fa fa-upload"></i> Select or drag the photo into the frame below</label>
                         <div class="input-image-product">
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
@endsection
