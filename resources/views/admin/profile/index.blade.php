@extends('admin.layout',[
'title' => __($title ?? 'Nông sản Việt')
])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">


                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <li class="nk-block-tools-opt">
                                                    <em class="icon ni ni-plus" data-target="#profile-edit"></em><span>Cập
                                                        nhật thông tin</span></a>
                                                </li>
                                            </div>

                                            <li class="nk-block-tools-opt">
                                                <a href="" class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="" class="btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Đổi mật khẩu</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-aside-wrap">
                                    <div class="card-content">
                                        <div class="card-inner">
                                            <div class="gap no-gap">
                                                <div class="top-area mate-black low-opacity">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="university-tag" style="border-bottom: 1px solid">
                                                <div class="uni-img">
                                                    <figure><img src="{{ Auth()->user()->avatar }}" alt=""></figure>
                                                </div>
                                                <div class="uni-name">
                                                    <h4>{{ Auth()->user()->name }}</h4>
                                                    <span>{{ Auth()->user()->username }}</span>
                                                </div>
                                            </div>
                                            <div class="nk-block">
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Thông tin cá nhân</h5>
                                                    <p></p>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Tên đăng nhập</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->username }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Họ tên</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày sinh</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->birthday }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Giới tính</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->gender }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Số điện thoại</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->phone }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ liên lạc</span>
                                                            <span class="profile-ud-value">
                                                                @if (Auth()->user()->ward_id != null)
                                                                    {{ Auth()->user()->address }},
                                                                    {{ Auth()->user()->ward->name }},
                                                                    {{ Auth()->user()->ward->district->name }},
                                                                    {{ Auth()->user()->ward->district->province->type }}
                                                                    {{ Auth()->user()->ward->district->province->name }}
                                                                @else
                                                                    {{ Auth()->user()->address }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Thông tin thêm</h6>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Số tài khoản ngân hàng</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->bank_account }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ email</span>
                                                            <span
                                                                class="profile-ud-value">{{ Auth()->user()->email }}</span>
                                                        </div>
                                                    </div>


                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-content -->

                                </div><!-- .card-aside-wrap -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- @@ Profile Edit Modal @e -->
        <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                        <h5 class="title">Cập nhật thông tin</h5>
                        <ul class="nk-nav nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal">Cá nhân</a>
                            </li>
                           
                        </ul><!-- .nav-tabs -->

                        <form action="{{ route('admin.profile.update', ['id' => Auth::user()->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Họ tên</label>
                                                <input type="text" class="form-control form-control-lg" id="full-name"
                                                    name="name" value="{{ Auth()->user()->name }}"
                                                    placeholder="Enter Full name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fv-phone">Giới tính</label>
                                                <div class="form-control-wrap">
                                                    <ul class="custom-control-group">
                                                        @if (Auth()->user()->gender == 'Nam')
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-male" value="Nam" checked
                                                                        required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-male">Nam</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-female" value="Nữ" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-female">Nữ</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-other" value="Khác" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-other">Khác</label>
                                                                </div>
                                                            </li>
                                                        @elseif (Auth()->user()->gender == 'Nữ')
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-male" value="Nam" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-male">Nam</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-female" value="Nữ" checked
                                                                        required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-female">Nữ</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-other" value="Khác" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-other">Khác</label>
                                                                </div>
                                                            </li>
                                                        @elseif (Auth()->user()->gender == 'Khác')
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-male" value="Nam" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-male">Nam</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-female" value="Nữ" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-female">Nữ</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-other" value="Khác" checked
                                                                        required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-other">Khác</label>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-male" value="Nam" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-male">Nam</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-female" value="Nữ" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-female">Nữ</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="gender" id="sex-other" value="Khác" required>
                                                                    <label class="custom-control-label"
                                                                        for="sex-other">Khác</label>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="phone-no">Số điện thoại</label>
                                                <input type="text" class="form-control form-control-lg" id="phone-no"
                                                    name="phone" value="{{ Auth()->user()->phone }}"
                                                    placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth-day">Ngày sinh</label>
                                                <input type="date" class="form-control form-control-lg" id="birth-day"
                                                    value="{{ Auth()->user()->birthday }}" name="birthday">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth-day">Email</label>
                                                <input type="email" class="form-control form-control-lg" id="birth-day"
                                                    value="{{ Auth()->user()->email }}" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="phone-no">Số tài khoản ngân hàng</label>
                                                <input type="text" class="form-control form-control-lg" id="phone-no"
                                                    value="{{ Auth()->user()->bank_account }}" name="bank_account">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth-day">Ảnh đại diện</label>
                                                <input type="file" accept="image/*" type='file' id="imgInp"
                                                    class="form-control form-control-lg"
                                                    value="{{ Auth()->user()->avatar }}" name="avatar">
                                                <div class="form-group">
                                                    <img src="{{ Auth()->user()->avatar }}" width="40%">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="birth-day">Xem trước</label>
                                            <div class="form-group">
                                                <img id="preview" width="40%" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                    @include('admin.locations.location')                                
                                </div><!-- .tab-pane -->
                            </div><!-- .tab-content -->
                        </form>
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endsection
