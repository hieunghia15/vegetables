@extends('admin.layout' , [ 'title' => __($title ?? 'Danh mục bài đăng')])
@section('main')

<div class="nk-content ">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">
                                <span><a href="" class="text-dark"><i
                                            class="fa-solid fa-house"></i></a></span>&ensp;&sol;&ensp;
                                <span><a href="" class="active">Danh mục bài đăng</a></span>
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
                                                    placeholder="Tìm kiếm nhanh bằng tên">
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                        <a href="{{route('admin.posts.categories_create')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Thêm mới</span></a>
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
    <div class="nk-tb-col tb-col-sm"><span>STT</span></div>
    <div class="nk-tb-col"><span>Tên loại bài đăng</span></div>
    <div class="nk-tb-col"><span>Slug</span></div>
    <div class="nk-tb-col tb-col-md"><span>Trạng thái</span></div>
    <div class="nk-tb-col tb-col-md"><span>Thời gian tạo</span></div>


    <div class="nk-tb-col nk-tb-col-tools">
    </div>
</div>
                    @foreach ($categories as $key => $category)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">{{$key+1}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                                <img src="../../../{{$category->thumbnail}}" alt="{{$category->name}}" class="thumb">
                                                <span class="title">{{$category->name}}</span>
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{$category->category_slug}}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">
                                                @if(($category->is_actived) ==1)
                                                Kích hoạt
                                                @else
                                                Không kích hoạt
                                                @endif
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{$category->created_at}}</span>
                                        </div>

                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="mr-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{route('admin.posts.categories_edit',['id'=>$category->id])}}"><em class="icon ni ni-edit"></em><span>Chỉnh
                                                                            sửa</span></a></li>
                                                                <li>
                                                                    <form action="{{route('admin.posts.categories_delete',['id' => $category->id])}}" method ="POST" >
                                                                        @csrf
                                                                         @method ('DELETE')
                                                                         <button type="submit"onclick="if (!confirm('Bạn có muốn xóa?')) { return false }"><span>Xóa</span></button>
                                                                     </form>
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
            </div>
        </div>
    </div>
</div>
@endsection

