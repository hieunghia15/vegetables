<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Giỏ hàng')])
    @stack('head')
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

.pl-01 {
    padding-top: 1px;
}

.active-show {
    color: #48702f;
}

.if-bg {
    background-color: #FFFFFF;
}

.btn-update {
    background-color: transparent;
    border: none !important;
    text-align: center;
    font-weight: bold !important;
    color: #000000;
}

.btn-update:hover {
    text-align: center;
    color: #48702f !important;
    font-weight: bold !important;
}

.newsletter {
    background-color: #CCCCCC;
    height: 60px;
}

.checkout-btn:hover {
    background-color: #FFFFFF;
    color: #000000;
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
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        @if(Session::get('Cart') !=null)
        @foreach (Session::get('Cart')->farmers as $product)
        <div class="ml-5 mr-5 pt-5">
            <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">{{$product['productInfo']->farmer->name}}</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="/../{{$product['productInfo']->thumbnail}}" width="100">
                                    <h5>
                                        <big>{{$product['productInfo']->name}}</big><br>
                                        <span>bởi:&emsp;{{$product['productInfo']->farmer->name}}</span>
                                    </h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <span> {{number_format($product['productInfo']->price)}}<sup>đ</sup></span>

                                </td>
                                <form action="{{route('customer.cart.updatecart',[$product['productInfo']->id,])}}">
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-{{$product['productInfo']->id}}" type="number"
                                                    value="{{$product['quanty']}}" name="quanty" min="1"
                                                    max="{{$product['productInfo']->inventory}}"
                                                    data-id="{{$product['productInfo']->id}}">

                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <span>{{number_format($product['price'])}}<sup>đ</sup></span>
                                    </td>
                                    <td>
                                        <button class="btn-update fa-solid fa-arrow-rotate-right"
                                            otype="submit"></button>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{route('customer.cart.deletecart',$product['productInfo']->farmer_id)}}"
                                            class="icon_close"></a>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('guest.index')}}" class="primary-btn cart-btn">Tiếp tục mua nông sản</a>
                        <a href="javascript:" class="primary-btn cart-btn cart-btn-right update-all">
                            <span class="icon_loading"></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Tra cứu phí vận chuyển</h5>
                            <form action="#">
                                <input type="text" placeholder="Nhập vào tên Tỉnh/Tp">
                                <button type="submit" class="site-btn">Tra cứu</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng thanh toán:</h5>
                        <ul>
                            <li>Tổng tiền <span> {{ number_format($product['price']) }}<sup>đ</sup></span></li>

                        </ul>
                        <a href="{{route('customer.cart.checkout',$product['productInfo']->farmer_id)}}"
                            class="primary-btn checkout-btn">Tiến hành thanh toán</a>
                    </div>
                </div>


            </div>
        </div>
        @endforeach
        @endif
    </section>
    <!-- Shoping Cart Section End -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
    $(".update-all").on("click", function() {
        // alert("ok");
        var lists = [];
        $("table tbody tr td").each(function() {
            $(this).find("input").each(function() {
                var element = {
                    id: $(this).data("id"),
                    quanty: $(this).val()
                };
                lists.push(element);
            });
        });
        //console.log(lists);
        $.ajax({
            url: 'cart/update-all',
            type: 'POST',
            data: {
                "_token": "{{csrf_token()}}",
                "data": lists
            }
        }).done(function(response) {
            //alert("ok");
            location.reload();
        });
    });
    </script>

</body>

</html>