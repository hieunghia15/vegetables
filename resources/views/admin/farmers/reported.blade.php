@extends('admin.layout', [ 'title' => __($title ?? 'Danh sách nông dân bị báo cáo')])
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
                                <span><a href="" class="active">Nông dân bị báo cáo</a></span>
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
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="card card-bordered product-card">
                                <div class="product-thumb">
                                    <a href="html/product-details.html">
                                        <img class="card-img-top" src="../image/farmer/Huỳnh Hương Liên.png"
                                            alt="Huỳnh Hương Liên">
                                    </a>
                                </div>
                                <div class="card-inner text-center">
                                    <h5 class="product-title"><a href="html/product-details.html">Huỳnh Hương Liên</a>
                                    </h5>
                                    <ul class="product-actions">
                                        <li><a href="#"><em class="icon ni ni-edit"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-eye"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="card card-bordered product-card">
                                <div class="product-thumb">
                                    <a href="html/product-details.html">
                                        <img class="card-img-top" src="../image/farmer/Lương Văn Của.png"
                                            alt="Lương Văn Của">
                                    </a>
                                </div>
                                <div class="card-inner text-center">
                                    <h5 class="product-title"><a href="html/product-details.html">Lương Văn Của</a>
                                    </h5>
                                    <ul class="product-actions">
                                        <li><a href="#"><em class="icon ni ni-edit"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-eye"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="card card-bordered product-card">
                                <div class="product-thumb">
                                    <a href="html/product-details.html">
                                        <img class="card-img-top" src="../image/farmer/Trần Thiện Dũng.png"
                                            alt="Trần Thiện Dũng">
                                    </a>
                                </div>
                                <div class="card-inner text-center">
                                    <h5 class="product-title"><a href="html/product-details.html">Trần Thiện Dũng</a>
                                    </h5>
                                    <ul class="product-actions">
                                        <li><a href="#"><em class="icon ni ni-edit"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-eye"></em></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-inner float-right">
                    <div class="nk-block-between-md g-3">
                        <div class="g">
                            <ul class="pagination justify-content-center justify-content-md-start active">
                                <li class="page-item"><a class="page-link" href="#"><em
                                            class="icon ni ni-chevrons-left"></em></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span>
                                </li>
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
@endsection