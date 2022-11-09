<style>
    .text-link {
        color: black;
        text-decoration: none;
    }

    .text-link:hover {
        color: #48702f;
        font-weight: bolder;
        text-shadow: 0.1em 0.1em 0.1em #2D3D34;
        text-transform: uppercase;
    }

    /* Menu Dropdown Account*/
    .nut_dropdown {
        background-color: transparent;
        color: #000;
        font-weight: 700;
        padding: 6px;
        font-size: 16px;
        border: none;
    }

    .dropdown-account {
        position: relative;
        display: inline-block;
    }


    .noidung_dropdown {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .noidung_dropdown a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .noidung_dropdown a:hover {
        background-color: #48702f;
        color: #FFFFFF;
    }

    .hienThi {
        display: block;
    }

    .name-auth {
        font-weight: 700;
        color: #48702f;
    }
</style>
<div class="header__top">
    <div class="ml-5 mr-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__top__left">
                    <ul>
                        <li><i class="fa-solid fa-users"></i>&ensp;
                                <a href="{{route('admin.index')}}" class="text-link">Trang quản lý</a>
                        </li>
                        <li><i class="fa-solid fa-headset"></i>&ensp;<a href="" class="text-link">Hỗ trợ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__top__right">
                    <div class="header__top__right__language">
                        <img src="img/language.png" alt="">
                        <div>Vietnamese</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">Vietnamese</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__social">
                        <a href="#" class="text-link">Tin tức</a>
                    </div>

                    <div class="header__top__right__auth">
                        <button onclick="hamDropdown()" class="nut_dropdown">
                            <img src="../../../{{Auth()->user()->avatar}}" width="30">
                            Xin chào, <span class="name-auth">{{Auth()->user()->name}}</span>!
                        </button>
                        <ul class="noidung_dropdown list-unstyled">
                            <li>
                                <a href="{{route('admin.profile.index')}}">Tài khoản của tôi</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();"><em class="icon ni ni-signout"></em>
                                        <span>Đăng xuất</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hamDropdown() {
        document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
    }

    window.onclick = function(e) {
        if (!e.target.matches('.nut_dropdown')) {
            var noiDungDropdown = document.querySelector(".noidung_dropdown");
            if (noiDungDropdown.classList.contains('hienThi')) {
                noiDungDropdown.classList.remove('hienThi');
            }
        }
    }
</script>
