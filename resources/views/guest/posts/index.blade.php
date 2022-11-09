<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', [
    'title' => __($title ?? 'Tin tức'),
    ])
    @stack('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<style>
.main-index {
    background-color: #f5f5f5;
}

.bg-image {
    background-image: url("{{ asset('../image/banner/qc-04.png') }}");
    height: 340px;
}

.img-qc {
    padding-bottom: 5px;
    height: 170px;
}

.post-tag {
    margin-left: 15px;
    margin-right: 15px;
    margin-bottom: 30px;
}

.post-btn {
    border: 2px solid #48702f;
    background-color: #FFFFFF;
    color: #48702f;
    font-size: 18px;
    font-weight: 600;
    line-height: 35px;
    width: 150px;
}

.post-btn:hover {
    background-color: #48702f;
    color: #FFFFFF;
}

.main-post {
    padding-left: 20px;
    padding-right: 20px;
}

.blog__btn {
    float: right;
    border: 2px solid #48702f !important;
    color: #48702f !important;
    font-weight: 600 !important;
}

.blog__btn:hover {
    background-color: #48702f;
    color: #FFFFFF !important;
}

.img-blog {
    max-height: 200px !important;
}
</style>

<body>
    <!-- Header Section Begin -->
    @if (Auth::check())
    @include('guest.layout.header-top-login')
    @else
    @include('guest.layout.header-top-logout')
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Blog Section Begin -->
    <section class="main-index">
        <div class="ml-5 mr-5">
            <div class="row pt-2 pb-5">
                <div class="col-lg-4">
                    <div class="hero__categories">
                        <img src="{{ asset('../image/banner/qc-05.png') }}" class="img-qc">
                        <img src="{{ asset('../image/banner/qc-07.jpg') }}" class="img-qc">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="hero__item bg-image">
                        <!--
                        <div class="hero__text">
                            <span class="text-white"><big>UY TÍN&ndash;CHẤT LƯỢNG&ndash;SẠCH</big></span>
                            <h2 style="color: #ABD904;">Nông Sản Việt <br />100% <b>Organic</b></h2>
                            <h5 class="text-white">Tháng kết nối, đưa Nông sản Việt đến mọi vùng miền</h5><br>
                            <a href="#shop-now" class="primary-btn">Đặt hàng ngay hôm nay!</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="post-tag">
                    <span class="pr-5"><button class="post-btn" onclick="location.href='{{ route('guest.index') }}'">Trang chủ</button></span>
                    <span class="pr-5"><button class="post-btn" onclick="location.href='{{ route('guest.blogs.index',$farmer_id) }}'">Tất cả</button></span>
                    @foreach ($categories as $category)
                    <span class="pr-5">
                        <button class="post-btn"
                            onclick="location.href='{{route('guest.blogs.category-post',$category->category_slug)}}'">{{ $category->name }}</button>
                    </span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            @include('guest.layout.searching-post')
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục tin tức</h4>
                            <ul>
                                <li><a href="{{ route('guest.blogs.index',$farmer_id) }}">Tất cả</a></li>
                                @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('guest.blogs.category-post', $category->category_slug) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin tức mới nhất</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($new_posts as $new_post)
                                <a href="{{ route('guest.blogs.read', $new_post->post_slug) }}"
                                    class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="../../../{{$new_post->thumbnail}}" alt="" width="100">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$new_post->title}}</h6>
                                        <span>{{ Carbon\Carbon::parse($new_post->created_at)->format('d-m-Y') }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($posts))
                <div class="col-lg-9 col-md-8 shadow">
                    @foreach ($posts as $post)
                    <div class="row main-post">
                        <table class="blog__item">
                            <div class="form-group col-md-5">
                                <div class="blog__item__pic">
                                    <img src="../../../{{$post->thumbnail}}" alt="{{$post->title}}" class="img-blog">
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i
                                                class="fa-solid fa-calendar"></i>&ensp;{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                                        </li>                                   
                                    </ul>
                                    <h5><a href="{{route('guest.blogs.read',$post->post_slug)}}">{{$post->title}}</a>
                                    </h5>
                                    <p>{{$post->description}}</p>
                                    <a href="{{route('guest.blogs.read',$post->post_slug)}}" class="blog__btn">Tìm
                                        hiểu
                                        thêm
                                        <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </table>
                    </div>
                    @endforeach
                    <br>
                    <div class="col-lg-12 pb-2">
                       {{$posts->links()}}
                    </div>
                </div>
                @else
                <h5>Không có bài viết</h5>
                @endif
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    @include('guest.layout.footer')
    <!-- Footer Section End -->
    @include('guest.layout.script')
</body>

</html>