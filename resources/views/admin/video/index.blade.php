@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{$titlePage}}</h5>
                                <a class="btn btn-success"
                                   href="{{route('admin.video.create')}}">Add video</a>
                            </div>
                            <div class="mb-3 d-flex justify-content-end">
                                <form class="d-flex align-items-center w-50" method="get"
                                      action="{{route('admin.video.index')}}">
                                    <input name="key_search" type="text" value="{{request()->get('key_search')}}"
                                           placeholder="Search title video" class="form-control" style="margin-right: 16px">
                                    <button class="btn btn-info"><i class="bi bi-search"></i></button>
                                    <a href="{{route('admin.video.index')}}" class="btn btn-danger" style="margin-left: 15px">Cancel </a>
                                </form>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">...</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($listData)>0)
                                    @foreach($listData as $key => $value)
                                        <tr>
                                            <th scope="row" style="width: 40px;">{{$key+1}}</th>
                                            <td style="width: 250px;">
                                             <video controls class="w-100">
                                                <source src="{{asset($value->src)}}" type="video/mp4">
                                              </video>
                                            </td>
                                            <td>
                                                {{$value->title}}
                                            </td>
                                            <td>
                                                @if($value->display == 1)On @else Off @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{url('admin/video/edit/'.$value->id)}}"
                                                       class="btn btn-icon btn-light btn-hover-success btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                       data-bs-original-title="Cập nhật">
                                                        <i class="bi bi-pencil-square "></i>
                                                    </a>
                                                    <a href="{{url('admin/video/delete/'.$value->id)}}"
                                                       class="btn btn-delete btn-icon btn-light btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                       data-bs-original-title="Xóa">
                                                        <i class="bi bi-trash "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $listData->appends(request()->all())->links('admin.pagination_custom.index') }}
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
        $('a.btn-delete').confirm({
            title: 'Confirm!',
            content: 'Are you sure you want to delete this data?',
            buttons: {
                ok: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function () {
                        location.href = this.$target.attr('href');
                    }
                },
                close: {
                    text: 'Cancel',
                    action: function () {
                    }
                }
            }
        });
    </script>
@endsection
