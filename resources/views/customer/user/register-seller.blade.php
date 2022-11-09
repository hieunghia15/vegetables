<!-- Head -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Đăng ký người bán | Vươn tầm nông sản Việt Nam</title>
<link rel="icon" href="../../image/Icon-agriculture.png" type="image/png" sizes="16x16">

<link rel="stylesheet" href="../../dashlite/assets/css/dashlite.css?ver=2.5.0">
<link rel="stylesheet" href="../../dashlite/assets/css/theme.css?ver=2.5.0">
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
                                <img src="../../image/login-logo.png">
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-des">
                                <center>
                                    <h5>Đăng ký trở thành người bán nông sản</h5>
                                </center>
                            </div>
                        </div>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="" class="form-validate is-alter" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">
                            <div class="form-group">
                                <label class="form-label" for="name" :value="__('Name')">Tên gian hàng</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                                        :value="old('name')" required autofocus
                                        placeholder="Vui lòng nhập tên gian hàng !">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="Tax code" :value="__('tax_code')">Mã số
                                        thuế</label>
                                </div>
                                <div class="form-control-wrap">
                                    <input autocomplete="off" type="text" name="tax_code" :value="old('tax_code')"
                                        required autofocus class="form-control form-control-lg" required id="tax_code"
                                        placeholder="Vui lòng nhập má số thuế !">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="avatar" :value="__('avatar')">Ảnh gian hàng</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control form-control-lg" id="avatar" name="avatar"
                                        :value="old('avatar')" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">{{ __('Hoàn tất đăng ký') }}</button>
                            </div>
                        </form>
                        <!--End Form -->
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
                                        <img class="round shadow" src="../../image/banner/ca-chua.png" alt="dang-ky">
                                    </div>
                                    <div class="nk-feature-content py-12 p-sm-3">
                                        <h1 class="NSV">
                                            <big><b>Nông sản Việt</b></big>
                                        </h1>
                                        <p class="pt-3">Chúng tôi cảm kết đảm bảo chất lượng với tiêu chuẩn
                                            3C:
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
