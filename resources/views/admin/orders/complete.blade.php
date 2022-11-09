@extends('admin.layout',[ 'title' => __($title ?? 'Đơn đã hoàn thành')])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Đơn đặt hàng đã hoàn thành</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04" placeholder="Tìm kiếm nhanh bằng mã">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate is-medium mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="oid">
                                        <label class="custom-control-label" for="oid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span>Mã đơn</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Ngày đặt hàng</span></div>
                                <div class="nk-tb-col"><span class="d-none d-mb-block">Trạng thái</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Khách hàng</span></div>
                                <div class="nk-tb-col"><span>Tổng tiền</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($orders as $order)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="oid01">
                                            <label class="custom-control-label" for="oid01"></label>
                                        </div>
                                    </div>
                                    
                                    <div class="nk-tb-col">
                                        <span class="tb-lead"><a href="#">{{$order->id}}</a></span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span class="tb-sub">{{$order->created_at->format('d/m/Y')}}</span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="d-none d-mb-inline-flex">{{$order->status->name}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm">
                                        <span class="tb-sub">{{$order->user->name}}</span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="tb-lead">{{$order->totals}}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <div class="drodown mr-n1">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="{{route('admin.orders.show',['id'=>$order->id])}}">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Chi tiết đơn hàng</span>
                                                            </a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Xóa đơn hàng</span></a></li>
                                                            @if(Auth::user()->getRoleNames()->first() == 'admin')
                                                            <li><a href="{{route('admin.orders.update-cancel',['id'=>$order->id])}}"><em class="icon ni ni-trash"></em><span>Hủy đơn hàng</span></a></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->  
                            @endforeach 
                        </div><!-- .nk-tb-list -->
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3 float-right">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li>
                                        </ul><!-- .pagination -->
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
