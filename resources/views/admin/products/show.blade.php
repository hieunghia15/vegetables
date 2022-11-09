@extends('admin.layout',[ 'title' => __($title ?? 'Chi tiết nông sản')])
@section('main')
    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Chi tiết nông sản</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Thông tin chi tiết</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ route('admin.products.index') }}"
                                    class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                        class="icon ni ni-arrow-left"></em><span>Trở lại</span></a>
                                <a href="{{ route('admin.products.index') }}"
                                    class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                        class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row pb-5">
                                    <div class="col-lg-6">
                                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                                            <div class="slider-init" id="sliderFor"
                                                data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                @foreach ($picture as $photo)
                                                <div class="slider-item rounded">
                                                    <img src="../../{{$photo->url}}" class="rounded w-100" alt="">
                                                </div>
                                                @endforeach
                                            </div><!-- .slider-init -->
                                            <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1,
                                                "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}},
                                                {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                                }'>
                                                @foreach ($picture as $photo)
                                                <div class="slider-item">
                                                    <div class="thumb">
                                                        <img src="../../{{$photo->url}}" class="rounded" alt="">
                                                    </div>
                                                </div>
                                                @endforeach
                                               
                                            </div><!-- .slider-nav -->
                                        </div><!-- .product-gallery -->
                                    </div><!-- .col -->
                                    <div class="col-lg-6">
                                        <div class="product-info mt-5 mr-xxl-5">
                                            <h4 class="product-price text-primary"><small
                                                    class="text-muted fs-20px"> {{number_format($product->price)}} đ</small></h4>
                                            <h2 class="product-title">{{$product->name}}</h2>
                                            <div class="product-rating">
                                                <ul class="rating">
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-half"></em></li>
                                                </ul>
                                                <div class="amount">(2 Reviews)</div>
                                            </div><!-- .product-rating -->
                                            <div class="product-excrept text-soft">
                                                <div class="fs-14px text-muted">Phương pháp trồng</div>
                                      
                                        <div class="fs-16px fw-bold text-secondary">{{$product->planting_methods}}</div>
                                            </div>
                                            <div class="product-meta">
                                                <ul class="d-flex g-3 gx-5">
                                                    <li>
                                                        <div class="fs-14px text-muted">Danh mục nông sản</div>
                                                        <div class="fs-16px fw-bold text-secondary">{{$product->farmProductType->name}}</div>
                                                    </li>
                                                    <li>
                                                        <div class="fs-14px text-muted">Gian hàng</div>
                                                        <div class="fs-16px fw-bold text-secondary">{{$shop}}</div>                                               
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .product-info -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                                <hr class="hr border-light">
                                <div class="col-12">
                                    <h5>Mô tả sản phẩm</h5>
                                    <div class="product-details entry mr-xxl-3">                                      
                                        <p class="lead">{!!$product->description!!}</p>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    </div>
@endsection
