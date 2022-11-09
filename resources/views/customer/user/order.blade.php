<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Đơn hàng')])
    @stack('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<style>
    .main-index {
        background-color: #f5f5f5;
    }

    .img-farmer {
        border: 0.35em double #48702f;
        border-width: 5px;
        border-radius: 50%;
        height: 7em;
        width: 7em;
    }

    .pl-01 {
        padding-top: 1px;
    }

    .active-show {
        color: #48702f;
    }

    .if-bg {
        background-color: #FFFFFF;
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

    .input-cancel {
        width: 70%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    /*---------------------
  Tab panel
-----------------------*/
    .order-tabs ul li {
        padding-left: 15px;
        list-style: none;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .order-tabs ul li a {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 700;

    }
    .order-tabs ul li a:hover {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 700;
        color: #7FAD39;

    }

    .nav-links {
        background-color: #fff;
        padding-top: 16px;
        width: 100%;
    }

    .nav-links__list {
        align-items: center;
        border-bottom: 3px solid #0e357f;
        display: flex;
        justify-content: space-between;
    }

    .nav-links__item {
        align-items: center;
        color: #133881;
        font-size: 14px;
        font-weight: 700;
        display: flex !important;
        flex-direction: column;
        justify-content: center;
        line-height: 1.5;
        height: 40px !important;
        width: 170px;
        text-align: center;
        box-sizing: border-box;
        text-decoration: none;
    }

    .nav-links__item:hover,
    .nav-links__item:focus {
        outline: none;
        outline-offset: 0;
    }

    .slick-current.nav-links__item {
        background-color: #133881;
        color: #fff;
        border-radius: 6px 6px 0 0;
    }

    .tab-content--slider {
        padding-bottom: 45px;
    }

    .tab-content--slider .slick-arrow {
        background-color: transparent;
        border: 0;
        border-radius: 50%;
        color: #707070;
        cursor: pointer;
        font-size: 0;
        height: 24px;
        padding: 0;
        position: absolute;
        text-align: center;
        bottom: 15px;
        width: 24px;
        line-height: 24px;
        z-index: 99;
    }

    .tab-content--slider .slick-prev {
        left: 15px;
    }

    .tab-content--slider .slick-next {
        right: 15px;
    }

    .tab-content--slider .slick-dots li {
        margin: 0 5px;
    }

    .tab-content--slider .slick-dots button {
        display: block;
        width: 6px;
        height: 6px;
        padding: 0;
        border: none;
        border-radius: 100%;
        background-color: #707070;
        text-indent: -9999px;
    }

    .tab-content--slider .slick-dots .slick-active button {
        background-color: #0e357f;
    }

    .tab-content--slider .slick-dots {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 23px;
        padding: 0;
        display: flex;
        justify-content: center;
        margin: 0;
        list-style-type: none;
    }

    .tab-info__item {
        border-bottom: 1px solid #d9e4e6;
        display: block;
        overflow: hidden;
        padding: 14px 16px;
    }

    .tab-info__link {
        color: #000;
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: middle;
        white-space: nowrap;
        width: 100%;
        text-decoration: none;
    }

    .tab-info__link:hover {
        color: #133881;
    }

    /*---------------------
  Search order
-----------------------*/
    .search-order {
        border-top: 25px solid #f5f5f5;
        border-bottom: 25px solid #f5f5f5;
        padding-left: 15px;
        padding-right: 15px;
    }

    .search-order input {
        position: relative;
        display: block;
        width: 965px;
    }

    /*---------------------
  Order History
-----------------------*/
    .order-header {
        padding-top: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #d9e4e6;
    }

    .frame-store {
        padding-right: 20px;
        font-weight: 700;
    }

    .follow-btn .site-btn {
        background-color: orangered;
        font-size: 10px;
        width: fit-content;
        height: 30px;
    }

    .follow-btn .site-btn:hover {
        background-color: orange;
    }

    .mess-btn .site-btn {
        background-color: steelblue;
        padding-left: 10px;
        font-size: 10px;
        width: fit-content;
        height: 30px;
        text-align: justify;
        color: #FFFFFF !important;
    }

    .mess-btn .site-btn:hover {
        background-color: blue;
        color: #FFFFFF;
    }

    .order-truck {
        color: #1CB4A6;
        float: right;
    }

    .order-comp {
        border-left: 1px solid #d9e4e6;
        padding-left: 15px;
        color: orangered;
        text-transform: uppercase;
        float: right;
        padding-top: 10px;
        text-decoration: none;
        display: block;
    }

    .order-list {
        padding-top: 15px;
        padding-left: 20px;
    }

    .order-text {
        padding-top: 25px;
        font-size: 20px;
        font-weight: 500;
        width: 800px;
    }

    .order-total {
        float: right;
        color: orangered;
        padding-top: 50px;
        padding-left: 15px;
    }

    .order-last {
        border-top: 1px solid #d9e4e6;
        padding-top: 15px;
        width: 100%;
    }

    .comm-btn .site-btn {
        width: 150px;
        float: right;
        background-color: orangered;
    }

    .comm-btn .site-btn:hover {
        border: 3px solid #FF6347;
        background-color: #FFFFFF;
        color: #FF6347;
        line-height: 15px;
    }

    .report-btn .site-btn {
        width: 140px;
        float: right;
        background-color: #FFFFFF;
        border: 2px solid yellow;
        color: #000000;
    }

    .report-btn .site-btn:hover {
        background-color: yellow;
        color: #000000;
    }

    .order-last-total {
        color: orangered;
        font-size: 30px;
        padding-left: 20px;
    }

    .cancel-btn .site-btn {
        width: fit-content;
        float: right;
        background-color: #DCDCDC;
        border: 2px solid #404040;
        color: #404040;
    }

    .cancel-btn .site-btn:hover {
        background-color: #404040;
        color: #F5F5F5;
    }

    .btn-received {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        display: none;
        float: right;
    }

    .no-order {
        padding-top: 300px;
        padding-left: 300px;
        background-position: 50% center;
        background-size: contain;
        background-repeat: no-repeat;
        width: 100px;
        height: 100px;
        background-image: url("{{ asset('../image/no-order.png') }}");
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Profile -->
    <section class="blog spad main-index">
        <div class="ml-5 mr-5">
            <div class="row">
                <div class="col-lg-3">
                    @csrf
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search pl-01">
                            <img src="../../../{{ Auth()->user()->avatar }}" class="img-farmer"
                                alt="{{ Auth()->user()->name }}">
                            <span class="h5"><b>{{ Auth()->user()->name }}</b>
                                <a href="{{ route('customer.user.profile') }}"><i
                                        class="fa-solid fa-pen"></i></a></span>
                        </div>
                        <div class="blog__sidebar__item">
                            <ul>
                                <li><a href="{{ route('customer.user.profile', [Auth()->user()->id]) }}">
                                        <span class="active-show">
                                            <i class="fa-solid fa-user"></i>&ensp;Tài khoản của tôi
                                        </span>
                                    </a></li>
                                <li><a href="{{ route('customer.orders.index') }}"><i
                                            class="fa-solid fa-clipboard"></i>&ensp;Đơn hàng</a></li>
                                <li>
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();"><em class="icon ni ni-signout"></em>
                                        <span>
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>&ensp;Đăng xuất
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row if-bg shadow">
                        <!-- Order -->
                        <div class=" mt-150 mb-150">
                            <div class="ml-5 mr-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Nav tabs -->
                                        <div class="row order-tabs">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#order"
                                                        aria-controls="order" role="tab" data-toggle="tab">Tất cả</a>
                                                </li>
                                                <li role="presentation"><a href="#confirm" aria-controls="confirm"
                                                        role="tab" data-toggle="tab">Chờ xác nhận</a></li>
                                                <li role="presentation"><a href="#pickup" aria-controls="pickup"
                                                        role="tab" data-toggle="tab">Chờ lấy hàng</a></li>
                                                <li role="presentation"><a href="#delivering" aria-controls="delivering"
                                                        role="tab" data-toggle="tab">Đang giao</a></li>
                                                <li role="presentation"><a href="#complete" aria-controls="complete"
                                                        role="tab" data-toggle="tab">Giao thành công</a></li>
                                                <li role="presentation"><a href="#cancel" aria-controls="cancelled"
                                                        role="tab" data-toggle="tab">Chờ xác nhận hủy</a></li>
                                                <li role="presentation"><a href="#cancelled" aria-controls="cancelled"
                                                        role="tab" data-toggle="tab">Đã hủy</a></li>

                                            </ul>
                                        </div>

                                        <div class="row product-lists">


                                            <!-- Tab panes -->
                                            <div class="tab-content ">
                                                <div role="tabpanel" class="tab-pane active" id="order">
                                                    @foreach ($orders as $order)
                                                        @foreach ($order->orderDetails as $order_detail)
                                                            <div class="tab-pane" id="all">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $order_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>
                                                                                            &ensp;Theo dõi
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $order_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>
                                                                                                &ensp;Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $order->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $order_detail->product->thumbnail }}"
                                                                                            alt="{{ $order_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $order_detail->product->name }}</span><br>
                                                                                        <small>x{{ $order_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($order_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8">
                                                                                        @if ($order->status_id == 1 && $order->status_id == 2)
                                                                                            <form
                                                                                                action="{{ route('customer.orders.cancel', ['id' => $order->id]) }}">
                                                                                                <button
                                                                                                    class="site-btn"
                                                                                                    type="submit">Hủy
                                                                                                    đơn</button>
                                                                                                <input type="text"
                                                                                                    name="reason_cancel"></input>

                                                                                            </form>
                                                                                        @endif
                                                                                        @if ($order->status_id == 5)
                                                                                            <div class="comm-btn">
                                                                                                <button
                                                                                                    class="site-btn">
                                                                                                    <span>Đánh
                                                                                                        giá</span>
                                                                                                </button>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">
                                                                                                {{ number_format($order->totals) }}<sup>đ</sup>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="confirm">
                                                    @foreach ($confirm as $confirm)
                                                        @foreach ($confirm->orderDetails as $confirm_detail)
                                                            <div class="tab-pane" id="confirm">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $confirm_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>&ensp;Theo
                                                                                            dõi
                                                                                        </button>

                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $confirm_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $confirm->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $confirm_detail->product->thumbnail }}"
                                                                                            alt="{{ $confirm_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $confirm_detail->product->name }}</span><br>
                                                                                        <small>x{{ $confirm_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($confirm_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8">
                                                                                        <form
                                                                                            action="{{ route('customer.orders.cancel', ['id' => $order->id]) }}">
                                                                                            <input type="text"
                                                                                                name="reason_cancel"
                                                                                                placeholder="Lý do hủy đơn..."
                                                                                                class="input-cancel" />
                                                                                            <button
                                                                                                class="site-btn"
                                                                                                type="submit">Hủy
                                                                                                đơn</button>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">{{ number_format($confirm->totals) }}<sup>đ</sup></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="pickup">
                                                    @foreach ($pickup as $pickup)
                                                        @foreach ($pickup->orderDetails as $pickup_detail)
                                                            <div class="tab-pane" id="pickup">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $pickup_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>
                                                                                            &ensp;Theo dõi
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $pickup_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $pickup->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $pickup_detail->product->thumbnail }}"
                                                                                            alt="{{ $pickup_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $pickup_detail->product->name }}</span><br>
                                                                                        <small>x{{ $pickup_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($pickup_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8">
                                                                                        <form
                                                                                            action="{{ route('customer.orders.cancel', ['id' => $order->id]) }}">
                                                                                            <input type="text"
                                                                                                name="reason_cancel"
                                                                                                placeholder="Lý do hủy đơn..."
                                                                                                class="input-cancel" />
                                                                                            <button
                                                                                                class="site-btn"
                                                                                                type="submit">Hủy
                                                                                                đơn</button>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">{{ number_format($pickup->totals) }}<sup>đ</sup></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach

                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="delivering">
                                                    @foreach ($delivering as $delivering)
                                                        @foreach ($delivering->orderDetails as $delivering_detail)
                                                            <div class="tab-pane" id="delivering">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $delivering_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>&ensp;Theo
                                                                                            dõi
                                                                                        </button>

                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $delivering_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $delivering->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $delivering_detail->product->thumbnail }}"
                                                                                            alt="{{ $delivering_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $delivering_detail->product->name }}</span><br>
                                                                                        <small>x{{ $delivering_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($delivering_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8">
                                                                                        <a href="{{ route('customer.orders.update_complete', ['id' => $delivering->id]) }}"
                                                                                            class="btn d-md-inline-flex 
                                                                                    btn-received">
                                                                                            <span>Đã nhận được
                                                                                                hàng</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">
                                                                                                {{ number_format($delivering->totals) }}<sup>đ</sup>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="complete">
                                                    @foreach ($complete as $complete)
                                                        @foreach ($complete->orderDetails as $complete_detail)
                                                            <div class="tab-pane" id="complete">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $complete_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>&ensp;Theo
                                                                                            dõi
                                                                                        </button>

                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $complete_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $complete->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $complete_detail->product->thumbnail }}"
                                                                                            alt="{{ $complete_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $complete_detail->product->name }}</span><br>
                                                                                        <small>x{{ $complete_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($complete_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8 comm-btn">
                                                                                        <button
                                                                                            class="site-btn"><span>Đánh
                                                                                                giá</span></button>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">{{ number_format($complete->totals) }}<sup>đ</sup></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="cancel">
                                                    @foreach ($cancel as $cancel)
                                                        @foreach ($cancel->orderDetails as $cancel_detail)
                                                            <div class="tab-pane" id="cancel">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $cancel_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>&ensp;Theo
                                                                                            dõi
                                                                                        </button>

                                                                                    </span>
                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $cancel_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $cancel->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $cancel_detail->product->thumbnail }}"
                                                                                            alt="{{ $cancel_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $cancel_detail->product->name }}</span><br>
                                                                                        <small>x{{ $cancel_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($cancel_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">{{ number_format($cancel->totals) }}<sup>đ</sup></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="cancelled">
                                                    @foreach ($cancelled as $cancelled)
                                                        @foreach ($cancelled->orderDetails as $cancelled_detail)
                                                            <div class="tab-pane" id="cancelled">
                                                                <div class="tab-info">
                                                                    <ul class="tab-info__list unstyled">
                                                                        <li class="tab-info__item">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 order-header">
                                                                                    <span
                                                                                        class="frame-store">{{ $cancelled_detail->product->farmer->name }}</span>
                                                                                    <span class="follow-btn">
                                                                                        <button class="site-btn">
                                                                                            <i
                                                                                                class="fa-solid fa-store"></i>&ensp;Theo
                                                                                            dõi
                                                                                        </button>

                                                                                    </span>

                                                                                    <span class="mess-btn pl-3">
                                                                                        <button class="site-btn">
                                                                                            <a href="{{ route('guest.seller.index', $cancelled_detail->product->farmer->id) }}"
                                                                                                class="text-white">
                                                                                                <i
                                                                                                    class="fa-regular fa-comment"></i>&emsp;
                                                                                                Gian hàng
                                                                                            </a>
                                                                                        </button>
                                                                                    </span>
                                                                                    <span class="order-truck">
                                                                                        <i
                                                                                            class="fa-solid fa-truck"></i>
                                                                                        &ensp;{{ $cancelled->status->name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="row order-list">
                                                                                    <div class="col-lg-4">
                                                                                        <img src="/../{{ $cancelled_detail->product->thumbnail }}"
                                                                                            alt="{{ $cancelled_detail->product->name }}"
                                                                                            width="100">&emsp;
                                                                                    </div>
                                                                                    <div class="col-lg-6 order-text">
                                                                                        <span
                                                                                            class="float-left">{{ $cancelled_detail->product->name }}</span><br>
                                                                                        <small>x{{ $cancelled_detail->quantity }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-2 order-total">
                                                                                        <span>{{ number_format($cancelled_detail->product->price) }}<sup>đ</sup></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row order-last">
                                                                                    <div class="col-lg-8">
                                                                                        <input type="hidden"
                                                                                            class="form-control" />
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <span>Tổng số tiền:
                                                                                            <span
                                                                                                class="order-last-total">
                                                                                                {{ number_format($cancelled->totals) }}<sup>đ</sup>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile End -->

    <!-- Footer Section Begin -->
    @include('guest.layout.footer')
    <!-- Footer Section End -->
    @include('guest.layout.script')
    <!-- Script dành riêng cho trang đơn hàng -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-links').each(function() {
                const navSlides = $(this).find('.nav-tabs--slider')
                const contentSlides = $(this).find('.tab-content--slider')

                contentSlides.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true,
                    infinite: false,
                    asNavFor: navSlides
                });

                navSlides.slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    asNavFor: contentSlides,
                    dots: false,
                    arrows: false,
                    infinite: false,
                    focusOnSelect: true
                });
            });
        });
    </script>
</body>

</html>
