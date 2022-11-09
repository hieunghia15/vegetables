<!-- Head -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Đăng nhập | Vươn tầm nông sản Việt Nam</title>
<link rel="icon" href="../image/Icon-agriculture.png" type="image/png" sizes="16x16">

<link rel="stylesheet" href="dashlite/assets/css/dashlite.css?ver=2.5.0">
<link rel="stylesheet" href="dashlite/assets/css/theme.css?ver=2.5.0">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.NSV {
    color: #48702f;
    font-size: 30px;
    text-transform: uppercase;
    text-shadow: 2px 2px 2px #2D3D34;
}

.login-title {
    font-size: 25px;
    font-weight: 500;
    color: #2D3D34;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

.mxh {
    border: 1px solid gray;
}
</style>
<!-- End Head -->

<x-guest-layout>
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
        <!-- content @s -->
        <div class="nk-content ">
            <div class="nk-split nk-split-page nk-split-md">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                class="icon ni ni-info"></em></a>
                    </div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="brand-logo pb-5">
                            <a href="/">
                                <img src="../image/login-logo.png">
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <p class="login-title">Đăng nhập</p>
                            </div>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('login') }}" class="form-validate is-alter"
                            autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="Username" :value="__('Username')">Username</label>
                                </div>
                                <div class="form-control-wrap">
                                    <input autocomplete="off" type="text" name="username" :value="old('username')"
                                        required autofocus class="form-control form-control-lg" required id="username"
                                        placeholder="Vui lòng nhập username!">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password" :value="__('Password')">Mật khẩu</label>
                                    @if (Route::has('password.request'))
                                    <a class="link link-primary link-sm" tabindex="-1"
                                        href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                    @endif
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                        data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="password" required autocomplete="current-password"
                                        id="password" class="form-control form-control-lg"
                                        placeholder="Vui lòng nhập mật khẩu!">
                                </div>
                            </div>
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Ghi nhớ tôi') }}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">{{ __('Đăng nhập') }}</button>
                            </div>
                        </form>
                        <!--End Form -->
                        <div class="text-center pt-4 pb-3">
                            <h6 class="overline-title overline-title-sap"><span>Hoặc</span></h6>
                        </div>
                        <ul class="nav justify-center ">
                            <li class="nav-item mxh">
                                <a class="nav-link" href="#">
                                    <i class="fa-brands fa-facebook"></i>&nbsp;Facebook
                                </a>
                            </li>
                            &emsp;&emsp;
                            <li class="nav-item mxh ">
                                <a class="nav-link" href="#">
                                <i class="fa-brands fa-google"></i>&nbsp;Google
                                </a>
                            </li>
                        </ul>
                        <div class="form-note-s2 pt-3"> Bạn mới biết đến Nông sản Việt? <a
                                href="html/pages/auths/auth-register.html">Đăng ký</a>
                        </div>
                    </div>
                    <div class="nk-block nk-auth-footer">
                        <div class="mt-1 offset-lg-2">
                            <p>&copy; 2022 NongsanViet</p>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .nk-split-content -->
                <div class="nk-split-content nk-split-stretch d-flex toggle-break-lg toggle-slide toggle-slide-right shadow"
                    style="background-color: #E1F1E7;" data-content="athPromo" data-toggle-screen="lg"
                    data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round shadow" src="../image/banner/cu-cai-do.png"
                                            alt="about-banner-03">
                                    </div>
                                    <div class="nk-feature-content py-12 p-sm-3">
                                        <h1 class="NSV">
                                            <big><b>Nông sản Việt</b></big>
                                        </h1>
                                        <p class="pt-3">Chúng tôi cảm kết đảm bảo chất lượng với tiêu chuẩn 3C:
                                            <span style="color: #48702f;">
                                                <b>CHUẨN TƯƠI</b> &ndash; <b>CHUẨN NGON</b> &ndash; <b>CHUẨN SẠCH</b>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .slider-init -->
                    </div><!-- .slider-wrap -->
                </div><!-- .nk-split-content -->
            </div><!-- .nk-split -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- content @e -->
</x-guest-layout>

<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=2.5.0"></script>
<script src="./assets/js/scripts.js?ver=2.5.0"></script>
<script src="./assets/js/charts/gd-default.js?ver=2.5.0"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>