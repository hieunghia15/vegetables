<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Gian hàng')])
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

    .price {
        padding-top: 10px;
        padding-bottom: 5px;
        color: #000000 !important;
    }

    .img-new-pro {
        max-width: 100px;
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

    .featured__item {
        border-radius: 10px;
    }

    .featured__item__pic {
        padding-bottom: 5px;
    }

    .save-prof {
        background-color: #FFFFFF;
        border: 2px solid #48702f !important;
        text-align: center;
        font-weight: bold !important;
        color: #000000;
    }

    .save-prof:hover {
        background-color: #48702f;
        text-align: center;
        font-weight: bold !important;
        color: #FFFFFF !important;
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
    <!-- Product Section Begin -->
    <section class="farm-product-filter spad">
        <div class="ml-5 mr-5">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Bộ lọc tìm kiếm</h4>
                            <form action="{{ route('guest.filter') }}">
                                <input type="hidden" value="{{ $productTypes }}" name="product">
                                <ul>
                                    @foreach ($product_Types as $key => $product_Type)
                                        <li>
                                            <input type="checkbox" name="type[]"
                                                value="{{ $product_Type->id }}" />&emsp;{{ $product_Type->name }}
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Nơi bán</h4>
                            @foreach ($provinces as $province)
                                <ul>
                                    <li><input type="checkbox" name="province[]"
                                            value="{{ $province->id }}" />&emsp;{{ $province->name }}</li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="sidebar__item">
                            <h4>Khoảng giá</h4>
                            <div class="pb-2">
                                <input type="text" class="col-4" name="top_level"
                                    placeholder=" 0đ">&ensp;&ndash;&ensp;
                                <input type="text" class="col-4" name="last_level" placeholder="Đến đ">
                            </div>
                            <div class="offset-2 pl-2">
                                <button type="submit" class="save-prof">Áp dụng</button>
                            </div>
                            </form>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Nông sản mới nhất</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($product_news as $product_new)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="../{{ $product_new->thumbnail }}"
                                                        alt="{{ $product_new->name }}" class="img-new-pro">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $product_new->name }}</h6>
                                                    <span>{{ number_format($product_new->price) }}<sup>đ</sup>/{{ $product_new->unit->name }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 shadow">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="filter__sort">
                                    <form action="{{ route('guest.product.filter_two') }}">
                                        <span>Sắp xếp theo</span>
                                        <select name="chose">
                                            <option value="">Mới nhất</option>
                                            <option value="0">Giá từ cao đến thấp</option>
                                            <option value="1">Giá từ thấp đến cao</option>
                                        </select>
                                        <button type="submit" class="btn btn-outline-success">Lọc</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row featured__filter">
                        @foreach ($productname as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item shadow">
                                    <div class="featured__item__pic">
                                        <img src="../{{ $product->thumbnail }}" alt="{{ $product->name }}"
                                            class="img-pro">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href=""><i class="fa fa-heart"></i></a></li>
                                            <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('customer.cart.addcart', $product->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{ route('guest.product.productdetail', $product->product_slug) }}"
                                                name="product_name[]" value=""><b>{{ $product->name }}</b></a>
                                        </h6>

                                        <div class="check-in">
                                            <span><i
                                                    class="fa-solid fa-location-dot"></i>&ensp;{{ $product->farmer->user->ward->district->province->name }}</span>
                                        </div>

                                        <h5 class="price">
                                            <a href="" name="product_price[]"
                                                class="text-dark">{{ number_format($product->price) }}</a>
                                            <sup>đ</sup>/{{ $product->unit->name }}
                                            <small class="float-right pr-2">Đã bán 1</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-12">
                        <div class="product__pagination pb-3 float-lg-right">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Section End -->
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
