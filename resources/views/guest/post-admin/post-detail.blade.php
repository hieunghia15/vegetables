<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? $posts->title)])
    @stack('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<style>
.main-index {
    background-color: #f5f5f5;
}

/*---------------------
  Blog Details Hero
-----------------------*/

.blog-details-hero {
    height: 350px;
    display: flex;
    align-items: center;
}

.blog__details__hero__text {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: left;
}

.blog__details__hero__text ul li {
    font-size: 16px;
    color: #000000;
    list-style: none;
    display: inline-block;
    margin-right: 45px;
    position: relative;
}

.blog__details__hero__text ul li a {
    text-decoration: none;
    color: #000000;
    list-style: none;
    display: inline-block;
}

.blog__details__hero__text ul li a:hover {
    width: fit-content;
    border: 1px solid #48702f;
    color: #48702f;
}

.blog__details__hero__text ul li:after {
    position: absolute;
    right: -26px;
    top: 0;
    content: "|";
}

.blog__details__hero__text ul li:last-child {
    margin-right: 0;
}

.blog__details__hero__text ul li:last-child:after {
    display: none;
}

.blog-detail-active {
    color: #48702f !important;
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <ul>
                            <li><a href="{{route('guest.index')}}">Trang chủ</a></li>
                            <li><a href="">{{$posts->category->name}}</a></li>
                            <li class="blog-detail-active">{{$posts->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            @include('guest.layout.searching-post')
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục tin tức</h4>
                            <ul>
                                <li><a href="{{route('guest.news.index')}}">Tất cả</a></li>                              
                                @foreach ($categories as $category)                                         
                                <li><a href="{{route('guest.news.category-post',$category->category_slug)}}">{{ $category->name }}</a></li>
                                @endforeach  
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin tức mới nhất</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($new_posts as $new_post)
                                <a href="{{ route('guest.blogs.read', $new_post->post_slug) }}" class="blog__sidebar__recent__item">
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
                <div class="col-lg-8 col-md-7 shadow">
                    <div class="row pt-5 pl-3 pr-3">
                        <div class="blog__details__text">
                            <h3 class="text-center">{{$posts->title}}</h3>
                            <center><small class="pb-3">{{$posts->postBy->name}} &ndash; {{ Carbon\Carbon::parse($posts->created_at)->format('d-m-Y') }}</small></center>
                            {!!$posts->content!!}
                        </div>
                    </div>
                    <div class="row pt-3 pb-3 pl-3 pr-3">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="../../../{{$posts->postBy->avatar}}" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>{{$posts->postBy->name}}</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Danh mục:</span>&emsp;{{$posts->category->name}}</li>
                                    <li><span>Tags:</span>&emsp;Tất cả, Phong cách sống, Ngày lễ</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
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