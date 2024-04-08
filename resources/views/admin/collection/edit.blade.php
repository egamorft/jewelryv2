@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit collection</h1>
        </div>
        <section class="section dashboard">
            <div class="bg-white p-4">
                @if (session('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{url('admin/collection/update',$collection->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">Title :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" value="{{$collection->title}}" type="text" maxlength="255" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                     <div class="col-3">Describe :</div>
                     <div class="col-8">
                        <textarea type="text" class="form-control  text-sm" name="describe" required rows="3" maxlength="255" class="ckeditor">{{$collection->describe}}</textarea>
                     </div>
                 </div>
                   
                    <div class="row mt-3">
                        <div class="col-3">Image :</div>
                        <div class="col-8">
                            <div class="form-control position-relative div-parent" style="padding-top: 50%">
                                <div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">
                                    <button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>
                                        <img src="{{asset($collection->src)}}" class="w-100 h-100" style="object-fit: cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">Banner :</div>
                        <div class="col-8">
                            <div class="form-control position-relative div-parent-banner" style="padding-top: 50%">
                                <div class="position-absolute w-100 h-100 div-file-banner" style="top: 0; left: 0;z-index: 10">
                                    @if ($collection->banner != null)
                                        <button type="button" class="position-absolute clear-banner border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>
                                            <img src="{{asset($collection->banner)}}" class="w-100 h-100" style="object-fit: cover">
                                    @else
                                        <button type="button" class="position-absolute border-0 bg-transparent select-image-banner" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                             <i style="font-size: 30px" class="bi bi-download"></i></button>
                                        @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-3">
                           Location :</div>
                        <div class="col-8">
                            <input class="form-control" name="index" value="{{$collection->index}}" type="number">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">ON/OFF :</div>
                        <div class="col-8">
                            <label class="switch">
                                <input type="checkbox" @if($collection->display == 1) checked @endif name="display">
                                <span class="slider round">ON</span>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-3"></div>
                        <div class="col-8 ">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('admin.collection.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" hidden>
                    <input type="file" name="banner" accept="image/x-png,image/gif,image/jpeg" hidden>
                    </div>
                </form>
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
        $('input[name="file"]').change(function(e){
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
            parent = $(this).closest(".div-parent");
            $(".div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            parent.html(html);
            $('input[name="file"]').val("");
        });

        let parent_banner;
        $(document).on("click", ".select-image-banner", function () {
            $('input[name="banner"]').click();
            parent_banner = $(this).parent();
        });
        $('input[name="banner"]').change(function(e){
            imgPreviewBanner(this);
        });
        function imgPreviewBanner(input) {
            let file = input.files[0];
            let mixedfile = file['type'].split("/");
            let filetype = mixedfile[0];
            if(filetype == "image"){
                let reader = new FileReader();
                reader.onload = function(e){
                    $("#preview-img-banner").show().attr("src", );
                    let html = '<div class="position-absolute w-100 h-100 div-file-banner" style="top: 0; left: 0;z-index: 10">' +
                        '<button type="button" class="position-absolute clear-banner border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>'+
                        '<img src="'+e.target.result+'" class="w-100 h-100" style="object-fit: cover">' +
                        '</div>';
                        parent_banner.html(html);
                }
                reader.readAsDataURL(input.files[0]);
            }else{
                alert("Invalid file type");
            }
        }
        $(document).on("click", "button.clear-banner", function () {
            parent_banner = $(this).closest(".div-parent-banner");
            $(".div-file-banner").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image-banner" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
                parent_banner.html(html);
            $('input[name="banner"]').val("");
        });
    </script>
@endsection
