<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Vươn tầm nông sản Việt Nam')])
    @stack('head')
    <style>
        .bg-body {
            background-color: #f5f5f5;
        }

        .set-bg {
            height: 250px;
            border-radius: 10px;
            margin-left: 50px;
            margin-right: 50px;
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
            height: 9.5em;
            width: 9.5em;
        }

        .header__menu__title {
            padding-top: 0px;
            padding-bottom: 5px;
        }

        .header__menu__lead {
            padding-top: 10px;
            padding-bottom: 10px;
            width: 800px;
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

        .newsletter {
            background-color: #CCCCCC;
            height: 60px;
        }

    </style>
</head>

<body>
    <!-- Header Section Begin -->
    @if (Auth::check())
        @include('guest.layout.header-top-login')
    @else
        @include('guest.layout.header-top-logout')
    @endif

    @include('guest.layout.header-bottom')
    <div class="bg-body">
        <!-- Farmstore frame -->
        <section class="breadcrumb-section set-bg" data-setbg="../../../{{ $farmer->avatar }}">
            <div class="ml-5 mr-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo farmer-frame">
                            <a href=""><img src="../../../{{ $farmer->user->avatar }}" class="img-farmer"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="header__menu">
                                    <div class="header__menu__title">
                                        <h3 class="text-white"><strong>{{ $farmer->name }}</strong></h3>
                                    </div>
                                    <div class="header__menu__lead">
                                        <ul>
                                            <li class="text-white"><span><i
                                                        class="fa-solid fa-location-dot"></i>&ensp;{{ $farmer->user->ward->district->province->name }}</span>
                                            </li>
                                            <li class="text-white">Đang hoạt động</li>
                                            <li class="text-white float-lg-right">Người theo dõi<br>
                                                <center><b>0</b></center>
                                            </li>
                                            <li class="text-white float-lg-right">Đánh giá<br>
                                                <center><b>0</b></center>
                                            </li>
                                            <li class="text-white float-lg-right pr-5 pr-100">Sản phẩm
                                                <br>
                                                <center><b>{{ $count_product }}</b></center>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul>
                                        <li class="mess-btn"><button type="button" class="site-btn"><i
                                                    class="fa-regular fa-comment"></i>&ensp;Chat ngay</button></li>
                                        <li class="follow-btn pt-2">
                                            <button type="button" class="site-btn">
                                                <i class="fa-solid fa-eye"></i>&ensp;Theo dõi
                                            </button>
                                        </li>

                                        <li class="mess-btn"><button type="button" class="site-btn"
                                                onclick="location.href='{{ route('guest.blogs.index', $farmer->id) }}';"><i
                                                    class="fa fa-newspaper-o"></i>&ensp;Tin tức</button></li>
                                        <li class="mess-btn"><button type="button" class="site-btn"
                                                onclick="location.href='{{ route('admin.index') }}';"><i
                                                    class="fa fa-newspaper-o"></i>&ensp;Quản lý</button></li>
                                        <li class="follow-btn pt-2"><button type="button" class="site-btn"
                                                onclick="location.href='{{ route('customer.cus-report.create2', $farmer->id) }}';"><i
                                                    class="fa fa-newspaper-o"></i>&ensp;Báo cáo</button></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Farmstore frame End -->

        <section class="product spad">
            <div class="ml-5 mr-5">
                <div class="row">
                    <!-- Sidebar Section Begin-->
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <form action="{{ route('guest.seller.filter', $farmer_id) }}" method="GET">                                 
                                    <div class="sidebar__item">
                                        <h4>Khoảng giá</h4>
                                        <div class="pb-2">
                                            <input type="text" class="col-4" name="top_level"
                                                placeholder=" 0đ">&ensp;&ndash;&ensp;
                                            <input type="text" class="col-4" name="last_level"
                                                placeholder="Đến đ">
                                        </div>
                                        <div class="offset-2 pl-2">
                                            <button type="submit" class="save-prof">Áp dụng</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 shadow">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="filter__sort">
                                    <form method="GET" action="{{ route('guest.seller.order-by', $farmer_id) }}">
                                        <span>Sắp xếp theo</span>
                                        <select name="choose">
                                            <option value="0">Mới nhất</option>
                                            <option value="1">Giá từ cao đến thấp</option>
                                            <option value="2">Giá từ thấp đến cao</option>
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
                        @foreach ($product as $value)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item shadow">
                                    <div class="featured__item__pic">
                                        <img src="../../../{{ $value->thumbnail }}" alt="{{ $value->name }}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href=""><i class="fa fa-heart"></i></a></li>
                                            <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{route('customer.cart.addcart',$value->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{route('guest.product.productdetail',$value->product_slug)}}"><b>{{ $value->name }}</b></a>
                                        </h6>
                                        <div class="check-in">
                                            <span><i class="fa-solid fa-location-dot"></i>&ensp;Đà Lạt</span>
                                        </div>
                                        <h5 class="price">
                                            {{ number_format($value->price) }}<sup>đ</sup>/{{ $value->weight }}
                                            {{ $value->unit->name }}
                                            <small class="float-right pr-2">Đã bán 1</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="float-lg-right">
                        {{ $product->links() }}
                    </div>
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
    </div>
    @include('guest.layout.script')
</body>

</html>
