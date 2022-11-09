@extends('admin.layout',[ 'title' => __($title ?? 'Thống kê')])
@section('main')
    <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Thống kê</h3>
                        </div><!-- .nk-block-head-content -->                     
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Tổng số nông sản</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                @if($products!=NULL)
                                                <div class="amount">{{$products}}</div>
                                                @else
                                                <div class="amount">0</div>
                                                @endif
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                       @if(Auth::user()->getRoleNames()->first() == 'admin')
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Tổng số nông dân</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{$farmers}}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->                    
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Tổng số khách hàng</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{$customers}}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        @endif
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Tổng doanh thu</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                @if($totals!=NULL)
                                                <div class="amount">{{number_format($totals)}}đ</div>
                                                @else
                                                <div class="amount">0</div>
                                                @endif                                             
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->                  
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection
