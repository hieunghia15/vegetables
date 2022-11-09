<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Trang cá nhân')])
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

.newsletter {
    background-color: #CCCCCC;
    height: 60px;
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

                        <div class="blog__sidebar">
                            <div class="blog__sidebar__search pl-01">
                                <img src="../../../{{ Auth()->user()->avatar }}" class="img-farmer"
                                    alt="{{Auth()->user()->name}}">
                                <span class="h5"><b>{{Auth()->user()->name}}</b></span>
                            </div>
                            <div class="blog__sidebar__item">
                                <ul>
                                    <li><a href="{{route('customer.user.profile')}}">
                                            <span class="active-show"><i class="fa-solid fa-user"></i>&ensp;Tài khoản
                                                của
                                                tôi</span>
                                        </a></li>
                                    <li><a href=""><i class="fa-solid fa-clipboard"></i>&ensp;Đơn hàng</a></li>
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
                    <div class="row if-bg shadow pl-3 pr-3">
                        <div class="col-lg-8">
                            <div class="header__menu">
                                <div class="header__menu__title">
                                    <div class="col-lg-12">
                                        <h4>Hồ sơ của tôi</h4>
                                        <span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
                                    </div>
                                   <div class="col-lg-12">
                                       <a href="{{route('customer.user.edit-profile',Auth()->user()->id)}}" class="btn btn-primary">Cập nhật tài khoản</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__text">
                                   <span>Họ tên: {{ Auth()->user()->name }}</span>
                                </div>
                                <div class="blog__item__text">
                                    <span>Số điện thoại: {{ Auth()->user()->phone }}</span>
                                </div>
                                <div class="blog__item__text">
                                    <span>Email: {{ Auth()->user()->email }}</span>
                                </div>
                                <div class="blog__item__text">
                                   <span>Ngày sinh: {{ Auth()->user()->birthday }}</span>
                                </div>
                                <div class="blog__item__text">
                                    <span>Giới tính: {{ Auth()->user()->gender }}</span>
                                </div>
                                <div class="blog__item__text">
                                    <span>Số tài khoản ngân hàng: {{ Auth()->user()->bank_account }}</span>
                                </div>
                                <div class="row blog__item__text">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            @if(Auth()->user()->ward_id != null)
                                            <span>Địa chỉ: {{ Auth()->user()->address }}, {{Auth()->user()->ward->name}}, {{Auth()->user()->ward->district->name}}, {{Auth()->user()->ward->district->province->name}}</span>
                                            @else <span>Địa chỉ: </span>
                                            @endif
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
