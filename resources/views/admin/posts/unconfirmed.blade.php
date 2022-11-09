@extends('admin.layout',[ 'title' => __($title ?? 'Bài viết chưa duyệt')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">
                                <span><a href="" class="text-dark"><i
                                            class="fa-solid fa-house"></i></a></span>&ensp;&sol;&ensp;
                                <span><a href="" class="text-dark">Bài viết</a></span>&ensp;&sol;&ensp;
                                <span><a href="" class="active">Bài viết chưa duyệt</a></span>
                            </h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04"
                                                    placeholder="Tìm kiếm nhanh bằng mã">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#"
                                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                    data-toggle="dropdown">Trạng thái</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Đã đăng</span></a></li>
                                                        <li><a href="#"><span>Chưa duyệt</span></a></li>
                                                        <li><a href="#"><span>Báo cáo</span></a></li>
                                                        <li><a href="#"><span>Đã xóa</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                    class="icon ni ni-plus"></em></a>
                                            <a href="#" class="btn btn-primary d-none d-md-inline-flex"><em
                                                    class="icon ni ni-plus"></em><span>Tạo bài viết</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="nk-tb-list is-separate is-medium mb-3">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="oid">
                                    <label class="custom-control-label" for="oid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span>Mã</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Ngày tạo</span></div>
                                <div class="nk-tb-col"><span class="d-none d-mb-block">Trạng thái</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Tác giả</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Tiêu đề</span></div>
                                <div class="nk-tb-col tb-col-md"><span></span></div>
                                <div class="nk-tb-col tb-col-md"><span></span></div>
                            </div>
                            @foreach ($posts as $key =>$post)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="oid01">
                                        <label class="custom-control-label" for="oid01"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">{{$key+1}}</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">{{$post->created_at}}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="dot bg-success d-mb-none"></span>
                                        @if(($post->is_actived) ==0)
                                        <span class="badge badge-sm badge-dot has-bg badge-info d-none d-mb-inline-flex">
                                            Chưa duyệt
                                        </span>
                                        @elseif(($post->is_actived) ==1)
                                        <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">
                                            Đã duyệt
                                        </span>
                                        @elseif(($post->is_actived) ==2)
                                        <span class="badge badge-sm badge-dot has-bg badge-danger d-none d-mb-inline-flex">
                                            Khóa 
                                        </span>
                                        @else
                                        <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">
                                            Báo cáo
                                        </span>
                                        @endif
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    
                                    <span class="tb-sub">{{$post->postBy->name}}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <img src="../../../{{$post->thumbnail}}"   style="width:60px;height:60px;">
                                    <span class="tb-sub text-primary">{{$post->title}}</span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    
                                    <a href="{{route('admin.posts.accept',['id' => $post->id])}}" method ="POST">
                                        <button type="submit"onclick="if (!confirm('Bạn muốn duyệt bài ?')) { return false }" class="btn btn-primary d-none d-md-inline-flex"><span>Duyệt bài</span></button>
                                        @csrf 
                                        @method('PATCH')
                                     </a>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown mr-n1">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('admin.posts.edit',['id'=>$post->id])}}"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a></li>
                                                        <li><a href="{{route('admin.posts.show',['id'=>$post->id])}}"><em class="icon ni ni-eye"></em><span>Xem chi tiết</span></a></li>
                                                        <li>
                                                            <a href="{{route('admin.posts.delete',['id' => $post->id])}}" method ="POST" >
                                                                <em class="icon ni ni-eye"></em>
                                                                <button type="submit"onclick="if (!confirm('Bạn có muốn xóa?')) { return false }"><span>Xóa</span></button>
                                                                @csrf
                                                                @method ('DELETE')
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-inner float-right">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        <li class="page-item"><a class="page-link" href="#"><em
                                                    class="icon ni ni-chevrons-left"></em></a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><span class="page-link"><em
                                                    class="icon ni ni-more-h"></em></span></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><em
                                                    class="icon ni ni-chevrons-right"></em></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection