<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Nông sản Việt Nam')])
    @stack('head')
</head>
<style>
    .main-index {
        background-color: #f5f5f5;
    }

    .img-qc {
        padding-bottom: 10px;
        height: 180px;
    }

    .product__item {
        border-radius: 10px;
    }

    .check-in {
        border-bottom: 1px solid black;
        padding-bottom: 5px;
    }
    .text-name{
        color: #AED9EA !important;
    }

    .price {
        padding-top: 10px;
        padding-bottom: 5px;
    }

    .newsletter {
        background-color: #CCCCCC;
        height: 60px;
    }

    .banner-wrap {
        margin-top: 10px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50%;
    }

    .banner {
        position: relative;
        display: block;
        overflow: hidden;
        z-index: 0;
    }

    .banner:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #ABD904;
        opacity: 50;
        border-radius: 30px;
        transition: .25s;
    }

    .banner:hover:before {
        width: 100%;
    }

    .features-wrap {
        margin-top: 20px;
    }

    .features-wrap .features {
        padding-bottom: 30px;
        border: 1px solid #e1e1e1;
        border-radius: 0;
    }

    .product__discount__item__pic {
        border-radius: 10px;
    }

    .product__discount__item {
        padding-bottom: 5px;
    }

    .featured__item {
        border-radius: 10px;
    }

    .featured__item__pic {
        padding-bottom: 5px;
    }

    /*--- store area ---*/
    .pr-20 {
        padding-right: 20px;
    }

    .set-bg {
        height: 180px;
        border-radius: 10px;
        margin-top: 30px;
        margin-left: 50px;
        margin-right: 50px;
    }

    .header__menu__title {
        padding-top: 0px;
        padding-bottom: 5px;
    }

    .header__menu__lead {
        padding-top: 10px;
        padding-bottom: 10px;
        width: 1000px;
    }

    .farmer-frame {
        padding-top: 20px;

    }

    .img-farmer {
        border: 0.1875em solid #FFFFFF;
        border-radius: 50%;
        box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);
        height: 7em;
        width: 7em;
    }

    .follow-btn .site-btn {
        background-color: orangered;
        width: 180px;
    }

    .follow-btn .site-btn:hover {
        background-color: orange;
    }

    .mess-btn .site-btn {
        background-color: yellowgreen;
        width: 180px;
    }

    .mess-btn .site-btn:hover {
        background-color: yellow;
        width: 180px;
    }

    .look-btn .site-btn {
        background-color: steelblue;
        width: 180px;
    }

    .look-btn .site-btn:hover {
        background-color: blue;
    }

    /*--- comment area ---*/
    .comment-area {
        display: inline-block;
        width: 100%;
    }

    .comment-title {
        display: inline-block;
        font-size: 28px;
        font-weight: 800;
        line-height: initial;
        margin-bottom: 20px;
        text-transform: capitalize;
        width: 100%;
    }

    .comments {
        display: inline-block;
        list-style: outside none none;
        margin-bottom: 0px;
        padding-left: 0;
        width: 100%;
    }

    .comment-box {
        background: #f9f9f9 none repeat scroll 0 0;
        border: 1px solid #ede9e9;
        border-radius: 5px;
        display: inline-block;
        padding: 20px;
    }

    .comments>li {
        border-radius: 3px;
        display: inline-block;
        margin-bottom: 20px;
        position: relative;
        width: 100%;
    }

    .comments>li:last-child {
        margin-bottom: 0;
    }

    .commenter-photo {
        display: table-cell;
        vertical-align: top;
    }

    .commenter-meta {
        display: table-cell;
        padding-left: 15px;
        position: relative;
        vertical-align: middle;
    }

    .commenter-photo>img {
        border: 2px solid;
        border-radius: 100%;
        padding: 3px;
        width: auto;
    }

    .comment-titles h6 {
        display: inline-block;
        font-size: 16px;
        font-weight: 700;
        text-transform: capitalize;
        vertical-align: top;
    }

    .comment-titles>span {
        color: #92929e;
        font-size: 11px;
        margin-left: 6px;
        margin-right: 22px;
        text-transform: uppercase;
    }

    .comment-titles a.reply {
        border-radius: 30px;
        display: inline-block;
        font-size: 13px;
        padding: 2px 18px;
        text-transform: capitalize;
        vertical-align: middle;
        margin-top: 0;
        color: #fff;
    }

    .comment-titles a.reply:hover {
        background: #000 none repeat scroll 0 0;
        color: #fff;
    }

    .commenter-meta>p {
        color: #666;
        float: left;
        font-size: 13px;
        font-weight: normal;
        line-height: 24px;
        padding-top: 10px;
        width: 90%;
        margin-bottom: 0;
    }

    .comments>li>ul {
        float: left;
        list-style: outside none none;
        margin-top: 17px;
        padding-left: 60px;
        width: 100%;
    }

    .comment-form {
        float: left;
        margin-top: 65px;
        width: 100%;
    }

    .comment-area.product .comment-box {
        border: 0 none;
        margin-bottom: 10px;
        padding: 0;
    }

    .comment-area.product .commenter-photo>img {
        max-width: 45px;
    }

    .comment-titles>ins {
        background: #fec42d none repeat scroll 0 0;
        border-radius: 30px;
        color: #ffffff;
        float: right;
        padding: 2px 13px;
        text-decoration: none;
    }

    .comment-area.product {
        display: inline-block;
        width: 100%;
    }

    .comment-area.product .comment-title {
        font-size: 22px;
        margin-bottom: 30px;
    }

</style>

<body>
    <!-- Header Section Begin -->
    @if (Auth::check())
        @include('guest.layout.header-top-login')
    @else
        @include('guest.layout.header-top-logout')
    @endif

    @include('guest.layout.header-bottom')
    <div class="row ml-5 mr-5 breadcrumb">
        <div class="col-lg-12">
            <h5>Trang chủ > Nông sản > {{ $products->name }}</h5>
        </div>
    </div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad mt-1">
        <div class="ml-5 mr-5">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="../../../{{ $products->thumbnail }}"
                                alt="{{ $products->name }}">
                        </div>

                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($picture as $photo)
                                <img data-imgbigurl="../image/product/Xà lách Mỡ Đà Lạt - 01.png"
                                    src="../../{{ $photo->url }}" alt="">
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $products->name }}</h3>                      
                        <div class="product__details__price">{{ number_format($products->price) }}<sup>đ</sup></div>
                        <ul class="text-decoration-none list-unstyled">
                            <li><span>Nơi bán :</span> {{ $products->farmer->user->ward->district->province->name }}
                            </li>
                            <li><span>Đóng gói :</span> {{ $products->pack }}</li>
                            <li><span>Phương pháp trồng :</span>{{ $products->planting_methods }}</li>
                        </ul>
                        <br>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('customer.cart.addcart', $products->id) }}" class="primary-btn">THÊM VÀO GIỎ
                            HÀNG</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Trọng lượng</b> <span>{{ $products->weight }} {{ $products->unit->name }}</span>
                            </li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả nông sản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá <span>(2)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <ul class="text-decoration-none list-unstyled">
                                        <li>{!! $products->description !!}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="comment-area product">
                                        <ul class="comments">
                                            <li>
                                                <div class="comment-box">
                                                    <div class="commenter-photo">
                                                        <img alt="" src="../image/Icon-agriculture.png">
                                                    </div>
                                                    <div class="commenter-meta">
                                                        <div class="comment-titles">
                                                            <h6>dogreen1010</h6>
                                                            <span>12/02/2022</span>
                                                        </div>
                                                        <h6>
                                                            Tươi ngon
                                                        </h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment-box">
                                                    <div class="commenter-photo">
                                                        <img alt="" src="../image/Icon-agriculture.png">
                                                    </div>
                                                    <div class="commenter-meta">
                                                        <div class="comment-titles">
                                                            <h6>phucha</h6>
                                                            <span>10/01/2022</span>
                                                        </div>
                                                        <h6>
                                                            Đóng gói cẩn thận, vận chuyển nhanh
                                                        </h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Farmstore frame -->
        <section class="breadcrumb-section set-bg" data-setbg="../../../{{ $products->farmer->avatar }}">
            <div class="ml-5 mr-5">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo farmer-frame">
                            <a href=""><img src="../../../{{$products->farmer->user->avatar}}"
                                    class="img-farmer" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="header__menu">
                                    <div class="header__menu__title">
                                        <h3 class="text-name"><strong>{{ $products->farmer->name }}</strong></h3>
                                    </div>
                                    <div class="header__menu__lead">
                                        <ul>
                                            <li><span class="text-name"><i class="fa-solid fa-location-dot"></i>&ensp;{{ $products->farmer->user->ward->district->province->name }}</span></li>
                                            <li class="text-name">Đang hoạt động</li>                                          
                                            <li class="text-name float-lg-right">Đánh giá<br>
                                            <li><span class="text-white"><i class="fa-solid fa-location-dot"></i>&ensp;{{ $products->farmer->user->ward->district->province->name }}</span></li>
                                            <li class="text-white">Đang hoạt động</li>
                                            <li class="text-white float-lg-right">Đánh giá<br>
                                                <center><b>0</b></center>
                                            </li>
                                            <li class="text-name float-lg-right pr-5 pr-100">Sản phẩm
                                                <br>
                                                <center><b>{{$count_product}}</b></center>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul>
                                        <li class="mess-btn"><button type="submit" class="site-btn"><i
                                                    class="fa-regular fa-comment"></i>&ensp;Chat ngay</button></li>
                                        <li class="look-btn">
                                            <a  class="site-btn" href="{{ route('guest.seller.index',$products->farmer->id) }}"><button type="submit"
                                                    class="site-btn">
                                                    <i class="fa-solid fa-eye"></i>&ensp;Gian hàng
                                                </button>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Farmstore frame End -->
    </section>
    <!-- Product Details Section End -->

    <!-- Sản phẩm tương tự của farmer -->
    <div class="col-lg-12 col-md-12" id="shop-now">
        <div class="product__discount ml-5 mr-5">
            <div class="section-title product__discount__title">
                <h2>Sản phẩm tương tự</h2>
                <span class="float-right"><a href="#">Xem tất cả</a></span>
            </div>

            <div class="row featured__filter">
                @foreach ( $similar_product as $value_similar)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item shadow">
                        <div class="featured__item__pic">
                            <img src="../../../{{$value_similar->thumbnail}}" alt="Hành tây">
                            <ul class="featured__item__pic__hover">
                                <li><a href=""><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('customer.cart.addcart', $value_similar->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('guest.product.productdetail', $value_similar->product_slug) }}">{{$value_similar->name}}</a></h6>
                            <div class="check-in">
                                <span><i class="fa-solid fa-location-dot"></i>&ensp;{{ $value_similar->farmer->user->ward->district->province->name }}</span>
                            </div>
                            <h5 class="price">{{ number_format($value_similar->price) }}<sup>đ</sup>/{{ $value_similar->weight }} {{ $value_similar->unit->name }}
                                <small class="float-right pr-2">Đã bán 1</small>
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Sản phẩm tương tự của các farmer khác -->
    <div class="col-lg-12 col-md-12" id="shop-now">
        <div class="product__discount ml-5 mr-5">
            <div class="section-title product__discount__title">
                <h2>Các sản phẩm khác</h2>
                <span class="float-right"><a href="#">Xem tất cả</a></span>
            </div>
            <div class="row featured__filter">
                @foreach ($product_details as $product_detail)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="featured__item shadow">
                            <div class="featured__item__pic">
                                <img src="../../../{{ $product_detail->thumbnail }}"
                                    alt="{{ $product_detail->name }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href=""><i class="fa fa-heart"></i></a></li>
                                    <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ route('customer.cart.addcart', $product_detail->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a
                                        href="{{ route('guest.product.productdetail', $product_detail->product_slug) }}">{{ $product_detail->name }}</a>
                                </h6>
                                <div class="check-in">
                                    <span><i
                                            class="fa-solid fa-location-dot"></i>&ensp;{{ $products->farmer->user->ward->district->province->name }}</span>
                                </div>
                                <h5 class="price">{{ number_format($product_detail->price) }}<sup>đ</sup>/1
                                    {{ $product_detail->unit->name }}
                                    <small class="float-right pr-2">Đã bán 1</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- QC Section -->
    <section class="banner-wrap three-column-banner">
        <div class="ml-5 mr-5">
            <div class="row">
                <div class="col-lg-4 col-md-6"><a target="_self" class="banner"><img
                            src="https://pm-s3-image.s3.ap-southeast-1.amazonaws.com/media/2/1/b/ZoQqdmxUpdyv9A6Ie9sxd4tjT4zgi68Mis6qeqQY.png"
                            alt="banner"></a></div>
                <div class="col-lg-4 col-md-6"><a target="_self" class="banner"><img
                            src="https://pm-s3-image.s3.ap-southeast-1.amazonaws.com/media/f/a/3/PEn8w58z4DhJt0WGYqkvGPSFHv1nsNZTJ0KQwdIS.jpg"
                            alt="banner"></a></div>
                <div class="col-lg-4 col-md-6"><a
                        href="https://postmart.vn/p/tao-dai-muong-la-htx-hung-thinh-hop-5kg-43160.html" target="_self"
                        class="banner"><img
                            src="https://pm-s3-image.s3.ap-southeast-1.amazonaws.com/media/d/e/a/rTBoqX6WYpfNSuN3uNBIx4PwtyVcddpldusCUypr.png"
                            alt="banner"></a></div>
            </div>
        </div>
    </section>
    <!-- QC Section End -->

    <section class="features-wrap">
        <div class="features bg-white">
            <div class="ml-5 mr-5">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pt-5">
                        <a href="">
                            <h4>
                                <span class="text-success"><i class="fa-solid fa-truck"></i></span>
                                <span>Vận chuyển toàn quốc</span>
                            </h4>
                            <span class="float-right text-dark">Vận chuyển toàn quốc 24/7</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 pt-5">
                        <a href="">
                            <h4>
                                <span class="text-success"><i class="fa-solid fa-user-shield"></i></i></span>
                                <span>Bảo mật thông tin</span>
                            </h4>
                            <span class="float-right text-dark">An toàn thông tin tuyệt đối</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 pt-5">
                        <a href="">
                            <h4>
                                <span class="text-success"><i class="fa-solid fa-certificate"></i></span>
                                <span>Đảm bảo chất lượng</span>
                            </h4>
                            <span class="float-right text-dark">Đảm bảo nguồn gốc xuất xứ</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 pt-5">
                        <a href="">
                            <h4>
                                <span class="text-success"><i class="fa-solid fa-headset"></i></span>
                                <span>Tư vấn nhiệt tình</span>
                            </h4>
                            <span class="float-right text-dark">Tư vấn viên hỗ trợ 24/7</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    </section>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 footer__widget pt-5">
                    <h5>Đăng ký bản tin và nhận thông tin ưu đãi mới</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 footer__widget pt-5">
                    <form action="#">
                        <input type="text" placeholder="Nhập địa chỉ email của bạn">
                        <button type="submit" class="site-btn">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Footer Section Begin -->
    @include('guest.layout.footer')
    <!-- Footer Section End -->
    @include('guest.layout.script')
</body>

</html>
