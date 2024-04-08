@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create Album</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('admin.album.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                    <div class="row mt-5 mb-5">
                        <div class="col-3"></div>
                        <div class="col-8 ">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{route('admin.album.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" hidden>
                    </div>
                </form>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
<script src="{{asset('assets/admin/js/input_file.js')}}" type="text/javascript"></script>
@endsection
