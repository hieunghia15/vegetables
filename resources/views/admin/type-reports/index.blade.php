@extends('admin.layout' , [ 'title' => __($title ?? 'Báo cáo')])
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
                                <span><a href="" class="active">Báo cáo</a></span>
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
                                            <a href="#" data-target="addProduct"
                                                class="toggle btn btn-icon btn-primary d-md-none"><em
                                                    class="icon ni ni-plus"></em></a>
                                            <a href="{{route('admin.type-reports.create')}}" data-target="addProduct"
                                                class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                    class="icon ni ni-plus"></em><span>Thêm loại báo cáo</span></a>
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
                            <div class="nk-tb-col"><span>Số thứ tự</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Báo cáo</span></div>
                            
                            <div class="nk-tb-col nk-tb-col-tools">
                            </div>
                        </div>
                        @foreach ($type_reports as  $type_report)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="oid01">
                                    <label class="custom-control-label" for="oid01"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-lead">{{$type_report->id}}</></span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{$type_report->name}}</span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown mr-n1">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('admin.type-reports.edit',$type_report->id)}}"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a></li>
                                                    
                                                   
                                                    <li><a href="{{route('admin.type-reports.delete',$type_report->id)}}"><em class="icon ni ni-trash"></em><span>Xóa</span></a></li>
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
                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Thêm loại báo cáo</h5>
                            <div class="nk-block-des">
                                <p>Vui lòng điền đầy đủ thông tin<sup class="text-danger">*</sup></p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-3">
                            
                            <form method="POST" action="{{route('admin.type-reports.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="product-title">Loại báo cáo</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" class="form-control" id="product-title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Hoàn tất</span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                

                
            </div>
        </div>
    </div>
</div>
@endsection