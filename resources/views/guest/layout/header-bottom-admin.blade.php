<style>
.hero__search__form {
    border-radius: 5px;
}

.site-btn {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
</style>
<section class="hero hero-normal">
    <div class="ml-5 mr-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('guest.index')}}"><img src="{{asset('../image/login-logo.png')}}" alt="Nông sản Việt"></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero__search mt-3">
                            <div class="hero__search__form">
                                @include('guest.layout.search')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <nav class="header__menu">
                            <ul>
                                <li><a href="{{route('guest.product.index')}}">Tất cả</a></li>
                                @foreach (\App\Models\FarmProductType::all() as $value)
                                <li><a href="{{route('guest.type', $value->product_type_slug)}}">{{$value->name}}</a></li>
                               @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
