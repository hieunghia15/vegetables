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

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="nk-tb-list is-separate is-medium mb-3">

                        <div class="nk-tb-item nk-tb-head">

                            <div class="nk-tb-col"><span>STT</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Khách hàng</span></div>
                            <div class="nk-tb-col tb-col-sm"><span>Gian hàng</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Loại báo cáo</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Lời nhắn của khách hàng</span></div>
                            <div class="nk-tb-col"><span>Trạng thái</span></div>
                            <div class="nk-tb-col nk-tb-col-tools">
                            </div>
                        </div>

                        @foreach ($reports as $key=> $report)
                        <div class="nk-tb-item">

                            <div class="nk-tb-col">
                                <span class="tb-lead">{{$key+1}}</></span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{$report->user->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <span class="tb-sub">{{$report->farmer->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{$report->type_report->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub text-primary">{{$report->messege}}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="dot bg-success d-mb-none"></span>
                                    @if(($report->processing) == 0)
                                    <span class="badge badge-sm badge-dot has-bg badge-info d-none d-mb-inline-flex">
                                        Chưa duyệt
                                    </span>
                                    @elseif(($report->processing) == 1)
                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">
                                        Đã duyệt
                                    </span>
                                    @endif
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown mr-n1">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('admin.ad-report.edit2',$report->id)}}"><em class="icon ni ni-edit"></em><span>Duyệt</span></a></li>
                                                    <li>
                                                        <form action="{{route('admin.ad-report.delete',['id' => $report->id])}}" method ="POST" >
                                                            @csrf
                                                             @method ('DELETE')
                                                             <em class="icon ni ni-delete"></em>
                                                             <button class="btn btn-danger"  type="submit"onclick="if (!confirm('Bạn có muốn xóa?')) { return false }"><span>Xóa</span></button>
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
