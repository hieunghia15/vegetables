<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Thanh toán')])
    @stack('head')
</head>
<style>
/*---------------------
  Checkout form
-----------------------*/
.checkout-bg {
    border: 1px solid #000000;
}

.add-header {
    background-color: #F5F5F5;
    border-top: 5px solid #48702F;
    line-height: auto;
}

.add-header .add-header-title {
    padding-top: 15px;
    padding-bottom: 10px;
    font-size: larger;
    font-weight: 700;
    float: left;
}

.checkout__form__bg {
    background-color: #F5F5F5;
    padding-top: 10px;
    border-top: 20px solid #FFFFFF;
}

.checkout__form__bg .follow-btn .site-btn {
    background-color: orangered;
    width: 160px;
    height: 40px;
}

.checkout__form__bg .follow-btn .site-btn:hover {
    background-color: orange;
}

.checkout__form__bg .follow-btn .mess-btn .site-btn {
    background-color: greenyellow;
    padding-left: 10px;
    font-weight: 700;
    color: #FFFFFF;
}

.checkout__form__bg .follow-btn .mess-btn .site-btn:hover {
    background-color: #48702F;
    color: #FFFFFF;
}

.checkout-detail {
    padding-bottom: 30px;
}

.checkout-detail-list {
    border-bottom: 2px solid #808080;
    padding-top: 30px;
    padding-bottom: 30px;
}

.frame-store {
    padding-left: 20px;
    padding-right: 20px;
    border-right: 2px solid grey;
}

.checkout-text-active {
    color: #000000;
    font-size: 18px;
    font-weight: 600;
    padding-left: 20px;
}

.checkout-text {
    float: right;
    color: #C0C0C0;
    padding-right: 50px;
}

.checkout-value {
    float: right;
    text-align: center;
    color: #000000;
    padding-right: 50px;
    padding-top: 30px;
}

.checkout-detail-payment {
    border-top: 20px solid #FFFFFF;
    border-bottom: 1px dashed #808080;
    padding-top: 30px;
    padding-bottom: 30px
}

.checkout-detail-payment-2 {
    border-bottom: 1px dashed #808080;
    padding-top: 30px;
    padding-bottom: 30px
}

.checkout-payment-text {
    float: right !important;
    color: #000000;
    padding-right: 40px;
}

.checkout-payment-text p {
    list-style-type: none;
    color: #404040;
    padding-bottom: 20px;
    line-height: 20px;
}

.checkout-payment-total {
    font-size: 25px;
    color: orangered;
    padding-bottom: 8px;
}

.checkout-order {
    background-color: #DDE8EB;
    padding-top: 30px;
    padding-bottom: 30px;
}

.order-btn .site-btn {
    background-color: #48702F;
    text-align: center;
    width: 90%;
}

.order-btn .site-btn:hover {
    background-color: transparent;
    border: 2px solid #48702F;
    color: #48702F;
}
.inp-price{
    border: none !important;
    background-color: transparent;
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
    @include('guest.layout.header-top-login')
    @else
    @include('guest.layout.header-top-logout')
    @endif
    @include('guest.layout.header-bottom')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <form action="{{route('customer.orders.store-order',$farmers['productInfo']->farmer_id)}}" method="POST">
            @csrf
            <div class="ml-5 mr-5 shadow">
                <div class="row add-header">
                    <div class="col-lg-12">
                        <span class="add-header-title pl-3">
                            <i class="fa-solid fa-location-dot"></i>&emsp;Địa chỉ nhận hàng:
                            {{Auth()->user()->address}}, {{Auth()->user()->ward->name}},
                            {{Auth()->user()->ward->district->name}}, {{Auth()->user()->ward->district->province->name}}

                        </span>

                    </div>
                    <div class="col-lg-12">
                        <div class="row pl-3">
                            <div class="col-3">

                            </div>
                            <div class="col-7">
                                <p>

                                    <span class="float-right pl-5 text-muted">Mặc định</span>
                                </p>
                            </div>
                            <div class="col-2">
                                <span class="float-right pr-5"><a href="">THAY ĐỔI</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row checkout__form__bg">
                    <div class="col-lg-12 pt-3">
                        <span class=" follow-btn pl-3">
                            <button type="submit" class="site-btn"><i class="fa-solid fa-store"></i>&ensp;Theo
                                dõi</button>
                            <span class="frame-store">{{$farmers['productInfo']->farmer->name}}</span>
                            <span class="mess-btn pl-3"><a href="" class=" site-btn"><i
                                        class="fa-regular fa-comment"></i>&emsp;Chat ngay</a></span>
                        </span>
                    </div>
                    <div class="col-lg-12">
                        <div class="row pt-3 pb-3">
                            <div class="col-6">
                                <span class="checkout-text-active">Nông sản</span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-text">Đơn giá</span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-text">Số lượng</span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-text">Thành tiền</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 checkout-detail">
                        <!-- List sản phẩm cần thanh toán -->

                        <div class="row checkout-detail-list">
                            <div class="col-6 checkout-text-active pl-5">
                                <img src="/../{{$farmers['productInfo']->thumbnail}}" width="100">&emsp;
                                <span>
                                    <big>{{$farmers['productInfo']->name}}</big><br>
                                </span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-value">{{$farmers['productInfo']->price}}<sup>đ</sup></span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-value">{{$farmers['quanty']}}</span>
                            </div>
                            <div class="col-2">
                                <span class="checkout-value">{{number_format($farmers['price'])}}<sup>đ</sup></span>
                            </div>
                        </div>

                        <!-- Phương thức thanh toán -->
                        <section class="">
                            <div class="row checkout-detail-payment">
                                <div class="col-7 checkout-text-payment pl-5">
                                    <span>
                                        <big>Phương thức thanh toán</big><br>
                                    </span>
                                </div>
                                <div class="col-3">
                                    <span class="checkout-payment-text">Thanh toán khi nhận hàng</span>
                                </div>
                                <div class="col-2">
                                    <span class="checkout-payment-text"><a href="">THAY ĐỔI</a></span>
                                </div>
                            </div>
                            <div class="row checkout-detail-payment-2">
                                <div class="form-group d-flex flex-column col-4 checkout-payment-text offset-4">
                                    <p>Tổng tiền hàng</p>
                                    <p>Phí vận chuyển</p>
                                    <p>Tổng thanh toán</p>
                                </div>
                                <div class="form-group d-flex flex-column col-4">
                                    <p class="checkout-payment-total">{{$farmers['price']}}<sup>đ</sup></p>
                                    <p class="checkout-payment-total">
                                        <input class="inp-price" name="express_id" value="{{$express}}" />
                                    </p>
                                    <p class="checkout-payment-total">
                                        <input class="inp-price" name="totals" value="{{$farmers['price'] + $express}}" />
                                    </p>
                                </div>
                                <div class="col-6 pl-5">
                                    <input type="text" name="note" class="form-control"
                                        placeholder="Lưu ý cho người bán...">
                                </div>
                            </div>
                            <div class="row checkout-order">
                                <div class="col-9 checkout-text-payment pl-5">
                                    <span>
                                        Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo
                                        <a href="">Điều khoản Nông sản Việt</a>
                                    </span>
                                </div>
                                <div class="col-3 order-btn">
                                    <button type="submit" class="site-btn">Đặt hàng</button>
                                </div>
                            </div>
                        </section>
                        <!-- End Phương thức thanh toán -->
                    </div>
                </div>
            </div>
        </form>
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

    <!-- Footer Section Begin -->
    @include('guest.layout.footer')
    <!-- Footer Section End -->
    @include('guest.layout.script')
</body>

</html>