<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Vươn tầm nông sản Việt Nam')])
    @stack('head')
</head>
<style>
.bg-image {
    background-image: url("../image/banner/banner-nsv.png");
    height: 350px;
}

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

.price {
    padding-top: 10px;
    padding-bottom: 5px;
}

.img-farmer {
    border: 0.1875em solid #FFFFFF;
    border-radius: 50%;
    box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);
    height: 12em;
    width: 12em;
}

.follow-btn .site-btn {
    background-color: orangered;
}

.mess-btn .site-btn {
    background-color: yellowgreen;
}

.newsletter {
    background-color: #CCCCCC;
    height: 60px;
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

/*---------------------
  QC Section
-----------------------*/
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
    border-color: #ABD904;
    border-style: solid;
    opacity: 50;
    transition: .25s;
}

.banner:hover:before {
    width: 100%;
}

/*---------------------
  Features
-----------------------*/
.features-wrap {
    margin-top: 20px;
}

.features-wrap .features {
    padding-bottom: 30px;
    border: 1px solid #e1e1e1;
    border-radius: 0;
}

.features-text-left {
    padding-top: 50px;
    border-right: 1px solid #404040;
}

.features-text {
    padding-top: 50px;
    border-right: 1px solid #404040;
}

.features-text-right {
    padding-top: 50px;
}


.features-title a h4 span {
    color: #28A745;
}
</style>

<body>
    <!-- Header Section Begin -->
    @if (Auth::check())
    @if(Auth()->user()->roles->first()->name == 'admin')
    @include('guest.layout.header-top-admin')
    @else
    @include('guest.layout.header-top-login')
    @endif
    @else
    @include('guest.layout.header-top-logout')
    @endif

    @if (Auth::check())
    @if(Auth()->user()->roles->first()->name == 'admin')
    @include('guest.layout.header-bottom-admin')
    @else
    @include('guest.layout.header-bottom')
    @endif
    @else
    @include('guest.layout.header-bottom')
    @endif

    <section class="main-index">
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="ml-5 mr-5">
                <div class="row pt-2 pb-5">
                    <div class="col-lg-4">
                        <div class="hero__categories">
                            <img src="../image/banner/qc-04.png" class="img-qc">
                            <img src="../image/banner/qc-05.png" class="img-qc">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="hero__item bg-image">
                            <div class="hero__text">
                                <span class="text-white"><big>UY TÍN&ndash;CHẤT LƯỢNG&ndash;SẠCH</big></span>
                                <h2 style="color: #ABD904;">Nông Sản Việt <br />100% <b>Organic</b></h2>
                                <h5 class="text-white">Tháng kết nối, đưa Nông sản Việt đến mọi vùng miền</h5><br>
                                <a href="#shop-now" class="primary-btn">Đặt hàng ngay hôm nay!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-5 mr-5">
                    <div class="row">
                        <div class="col-lg-12 ml-5 mr-5">
                            <div class="section-title">
                                <h2>Danh mục nông sản</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach ($productTypes as $producttype)
                            <div class="col-lg-4">
                                <div class="product__discount__item shadow">
                                    <div class="product__discount__item__pic">
                                        <a href="{{route('guest.type', $producttype->product_type_slug)}}" title="">
                                            <img src="{{$producttype->thumbnail}}" alt="{{$producttype->name}}">
                                        </a>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{route('guest.type', $producttype->product_type_slug)}}"><i
                                                        class="fa fa-eye" title="Xem nông sản"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5 class="pb-2"><b><a
                                                    href="{{route('guest.type', $producttype->product_type_slug)}}">{{$producttype->name}}</a></b>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Sản phẩm mới</h2>
                                <span class="float-right"><a href="#">Xem tất cả</a></span>
                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @foreach ($product_news as $product_new)
                                    <div class="col-lg-4 ">
                                        <div class="product__discount__item shadow">
                                            <div class="product__discount__item__pic">
                                                <img src="{{$product_new->thumbnail}}" alt="">
                                            </div>
                                            <div class="product__discount__item__text">
                                                <h5><a
                                                        href="{{route('guest.product.productdetail',$product_new->product_slug)}}">
                                                        <b>{{$product_new->name}}</b>
                                                    </a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12" id="shop-now">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Gợi ý hôm nay</h2>
                            <span class="float-right"><a href="#">Xem tất cả</a></span>
                        </div>
                        <div class="row featured__filter">
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item shadow">
                                    <div class="featured__item__pic">
                                        <img src="{{$product->thumbnail}}" alt="{{$product->name}}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href=""><i class="fa fa-heart"></i></a></li>
                                            <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{route('customer.cart.addcart',$product->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a
                                                href="{{route('guest.product.productdetail',$product->product_slug)}}"><b>{{$product->name}}</b></a>
                                        </h6>
                                        <div class="check-in">
                                            <span><i
                                                    class="fa-solid fa-location-dot"></i>&ensp;{{$product->farmer->user->ward->district->province->name}}</span>
                                        </div>
                                        <h5 class="price">
                                            {{number_format($product->price ) }}<sup>đ</sup>/{{$product->weight}}
                                            {{$product->unit->name}}
                                            <small class="float-right pr-2">Đã bán 1</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

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
                            href="https://postmart.vn/p/tao-dai-muong-la-htx-hung-thinh-hop-5kg-43160.html"
                            target="_self" class="banner"><img
                                src="https://pm-s3-image.s3.ap-southeast-1.amazonaws.com/media/d/e/a/rTBoqX6WYpfNSuN3uNBIx4PwtyVcddpldusCUypr.png"
                                alt="banner"></a></div>
                </div>
            </div>
        </section>

        <!-- QC Section End -->
        <section class="features-wrap">
            <div class="features bg-white">
                <div class="ml-5 mr-5">
                    <div class="row features-title">
                        <div class="col-lg-3 col-md-4 features-text-left">
                            <a href="">
                                <h4>
                                    <span><i class="fa-solid fa-truck"></i></span>
                                    <span>Vận chuyển toàn quốc</span>
                                </h4>
                                <span class="float-right text-dark">Vận chuyển toàn quốc 24/7</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 features-text">
                            <a href="">
                                <h4>
                                    <span><i class="fa-solid fa-user-shield"></i></i></span>
                                    <span>Bảo mật thông tin</span>
                                </h4>
                                <span class="float-right text-dark">An toàn thông tin tuyệt đối</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 features-text">
                            <a href="">
                                <h4>
                                    <span><i class="fa-solid fa-certificate"></i></span>
                                    <span>Đảm bảo chất lượng</span>
                                </h4>
                                <span class="float-right text-dark">Đảm bảo nguồn gốc xuất xứ</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 features-text-right">
                            <a href="">
                                <h4>
                                    <span><i class="fa-solid fa-headset"></i></span>
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