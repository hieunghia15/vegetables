<style>
.header__top {
    border-bottom: 4px solid #48702f !important;
}

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
</style>
<div class="header__top">
    <div class="ml-5 mr-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__top__left">
                    <ul>
                        <li>
                            <a href="{{route('login')}}" class="text-link">
                                <i class="fa-solid fa-users"></i>&ensp;Kênh người bán
                            </a>
                        </li>
                        <li>
                            <a href="" class="text-link">
                                <i class="fa-solid fa-headset"></i>&ensp;Hỗ trợ
                            </a>
                        </li>
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
                        <a href="{{route('guest.news.index')}}" class="text-link">Tin tức</a>
                    </div>

                    <div class="header__top__right__social">
                        <a href="{{route('login')}}" class="text-link">Đăng nhập</a>
                    </div>
                    <div class="header__top__right__auth">
                        <a href="{{route('register')}}" class="text-link">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>