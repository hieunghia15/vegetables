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
                    <form action="{{ route('customer.user.update-profile', ['id' => Auth::user()->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="blog__sidebar">
                            <div class="blog__sidebar__search pl-01">
                                <img src="../../../{{ Auth()->user()->avatar }}" class="img-farmer"
                                    alt="{{Auth()->user()->name}}">
                                <span class="h5"><b>{{Auth()->user()->name}}</b></span>
                            </div>
                            <div class="blog__sidebar__item">
                                <ul>
                                    <li><a href="{{route('customer.user.profile',[Auth()->user()->id])}}">
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
                        <div class="col-lg-12">
                            <div class="header__menu">
                                <div class="header__menu__title">
                                    <h4>Hồ sơ của tôi</h4>
                                    <span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__text">
                                    <input class="form-control" type="text" name="name"
                                        value="{{ Auth()->user()->name }}">
                                </div>
                                <div class="blog__item__text">
                                    <input class="form-control" type="text" name="phone"
                                        value="{{ Auth()->user()->phone }}">
                                </div>
                                <div class="blog__item__text">
                                    <input class="form-control" type="email" name="email"
                                        value="{{ Auth()->user()->email }}">
                                </div>
                                <div class="blog__item__text">
                                    <input class="form-control" type="date" name="birthday"
                                        value="{{ Auth()->user()->birthday }}">
                                </div>
                                <div class="blog__item__text">
                                    <div class="form-control-wrap">
                                        <ul class="custom-control-group">
                                            @if (Auth()->user()->gender == 'Nam')
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-male" value="Nam" checked required>
                                                    <label class="custom-control-label" for="sex-male">Nam</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-female" value="Nữ" required>
                                                    <label class="custom-control-label" for="sex-female">Nữ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-other" value="Khác" required>
                                                    <label class="custom-control-label" for="sex-other">Khác</label>
                                                </div>
                                            </li>
                                            @elseif (Auth()->user()->gender == 'Nữ')
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-male" value="Nam" required>
                                                    <label class="custom-control-label" for="sex-male">Nam</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-female" value="Nữ" checked required>
                                                    <label class="custom-control-label" for="sex-female">Nữ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-other" value="Khác" required>
                                                    <label class="custom-control-label" for="sex-other">Khác</label>
                                                </div>
                                            </li>
                                            @elseif (Auth()->user()->gender == 'Khác')
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-male" value="Nam" required>
                                                    <label class="custom-control-label" for="sex-male">Nam</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-female" value="Nữ" required>
                                                    <label class="custom-control-label" for="sex-female">Nữ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-other" value="Khác" checked required>
                                                    <label class="custom-control-label" for="sex-other">Khác</label>
                                                </div>
                                            </li>
                                            @else
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-male" value="Nam" required>
                                                    <label class="custom-control-label" for="sex-male">Nam</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-female" value="Nữ" required>
                                                    <label class="custom-control-label" for="sex-female">Nữ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="gender"
                                                        id="sex-other" value="Khác" required>
                                                    <label class="custom-control-label" for="sex-other">Khác</label>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog__item__text">
                                    <label >Số tài khoản ngân hàng</label>
                                    <input class="form-control" type="text" name="bank_account"
                                        value="{{ Auth()->user()->bank_account }}">
                                </div>
                                <div class="blog__item__text">
                                    <div class="">
                                        <div class="form-group">
                                            <label >Địa chỉ chi tiết</label>
                                            <input type="text" class="form-control" id="address"
                                                value="{{ Auth()->user()->address }}" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row blog__item__text">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="region">Vùng miền</label>
                                            @if(Auth()->user()->ward_id != null)
                                            <select class="form-control" id="region-dropdown">
                                                <option value="">Chọn vùng miền</option>
                                                <option selected="selected" value="{{ Auth()->user()->ward->district->province->region->id }}">
                                                    {{ Auth()->user()->ward->district->province->region->name }}
                                                </option>
                                                @foreach ($region_user as $region)
                                                    <option value="{{ $region->id }}">
                                                        {{ $region->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @else
                                            <select class="form-control" id="region-dropdown">
                                                <option value="">Chọn vùng miền</option>
                                                @foreach ($region_user as $region)
                                                    <option value="{{ $region->id }}">
                                                        {{ $region->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row blog__item__text">
                                    <!-- Tỉnh/Tp -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @if (Auth()->user()->ward_id != null)
                                            <select class="form-control" id="province-dropdown">
                                                <option value="  {{ Auth()->user()->ward->district->province->id }}">
                                                    {{ Auth()->user()->ward->district->province->name }}
                                                </option>
                                            </select>
                                            @else
                                            <select class="form-control" id="province-dropdown">
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Quận/Huyện -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @if (Auth()->user()->ward_id != null)
                                            <select class="form-control" id="district-dropdown" name="district">
                                                <option value="  {{ Auth()->user()->ward->district->id }}">
                                                    {{ Auth()->user()->ward->district->name }}
                                                </option>
                                            </select>
                                            @else
                                            <select class="form-control" id="district-dropdown" name="district">
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Phường/Xã -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @if (Auth()->user()->ward_id != null)
                                            <select class="form-control" id="ward-dropdown" name="ward_id">
                                                <option value="{{ Auth()->user()->ward_id }}">
                                                    {{ Auth()->user()->ward->name }}
                                                </option>
                                            </select>
                                            @else
                                            <select class="form-control" id="ward-dropdown" name="ward_id">
                                            </select>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="blog__item__text">

                                </div>
                                <div class="blog__item__text">

                                </div>
                                <div class="blog__item__text">
                                    <div class=" offset-5">
                                        <button type="submit" class="blog__btn save-prof">Lưu thay đổi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="../../../{{ Auth()->user()->avatar }}" alt="{{ Auth()->user()->name }}"
                                width="100%">
                            <input class="input-form pt-2" accept="image/*" type='file' id="imgInp" name="avatar"
                                value="{{ Auth()->user()->avatar }}">
                            <p>Xem trước</p>
                            <img id="preview" width="100%" />
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript">
                </script>
                <script>
                $(document).ready(function() {
                    $('#region-dropdown').on('change', function() {
                        var region_id = this.value;
                        $("#province-dropdown").html('');
                        $.ajax({
                            url: "{{ route('locations.get-province') }}",
                            type: "POST",
                            data: {
                                region_id: region_id,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $('#province-dropdown').html(
                                    '<option value="">Chọn tỉnh/thành phố</option>'
                                );
                                $.each(result.provinces, function(
                                    key, value) {
                                    $("#province-dropdown")
                                        .append(
                                            '<option value="' +
                                            value
                                            .id +
                                            '">' + value
                                            .name +
                                            '</option>');
                                });
                                $('#district-dropdown').html(
                                    '<option value="">Chọn quận/huyện </option>'
                                );
                                $('#ward-dropdown').html(
                                    '<option value="">Chọn phường xã </option>'
                                );
                            }
                        });

                    });
                    $('#province-dropdown').on('change', function() {
                        var province_id = this.value;
                        $("#district-dropdown").html('');
                        $.ajax({
                            url: "{{ route('locations.get-district') }}",
                            type: "POST",
                            data: {
                                province_id: province_id,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $('#district-dropdown').html(
                                    '<option value="">Chọn quận/huyện</option>'
                                );
                                $.each(result.districts, function(
                                    key, value) {
                                    $("#district-dropdown")
                                        .append(
                                            '<option value="' +
                                            value
                                            .id +
                                            '">' + value
                                            .name +
                                            '</option>');
                                });
                                $('#ward-dropdown').html(
                                    '<option value="">Chọn phường xã </option>'
                                );
                            }
                        });
                    });

                    $('#district-dropdown').on('change', function() {
                        var district_id = this.value;
                        $("#ward-dropdown").html('');
                        $.ajax({
                            url: "{{ route('locations.get-ward') }}",
                            type: "POST",
                            data: {
                                district_id: district_id,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $('#ward-dropdown').html(
                                    '<option value="">Chọn phường/xã</option>'
                                );
                                $.each(result.wards, function(key,
                                    value) {
                                    $("#ward-dropdown")
                                        .append(
                                            '<option value="' +
                                            value.id +
                                            '">' + value
                                            .name +
                                            '</option>');
                                });
                            }
                        });
                    });

                });
                </script>
                <script>
                    imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            preview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                </form>
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
    <script src="{{ asset('farmer/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('farmer/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('farmer/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('farmer/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('farmer/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('farmer/js/mixitup.min.js') }}"></script>
<script src="{{ asset('farmer/js/main.js') }}"></script>
</body>

</html>
