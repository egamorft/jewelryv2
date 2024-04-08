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
                                   href="{{route('admin.album.create')}}">Add Album</a>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">...</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($listData)>0)
                                    @foreach($listData as $key => $value)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>
                                                <div class="w-100 position-relative"
                                                     style="padding-top: 50%;min-width: 150px">
                                                    <img src="{{asset($value->src)}}" class="position-absolute w-100 h-100"
                                                         style="top: 0;left: 0;object-fit: cover">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{url('admin/album/edit/'.$value->id)}}"
                                                       class="btn btn-icon btn-light btn-hover-success btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                       data-bs-original-title="Cập nhật">
                                                        <i class="bi bi-pencil-square "></i>
                                                    </a>
                                                    <a href="{{url('admin/album/delete/'.$value->id)}}"
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
