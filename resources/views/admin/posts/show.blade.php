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
                                <h3 class="nk-block-title page-title">
                                <span><a href="" class="text-dark"><i class="fa-solid fa-house"></i></a></span>&ensp;&sol;&ensp;
                                <span><a href="" class="active">Bài viết</a></span>
                                </h3>
                            </div>
                            <div class="nk-block-head-content">

                            </div>
                        </div>
                    </div>
                    <div class="blog-detail">
                        <div class="blog-title">
                            <h2>{{$postshow->title}}</h2>
                            <b>{{$postshow->description}}</b>
                        </div>
                        <div class="blog-details-meta">
                            <figure><img src="../../../{{$postshow->thumbnail}}"></figure>
                            <ul>

                                <li><i class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></i>{{$postshow->created_at}}</li>
                            </ul>
                            <div   align="justify"> {!!$postshow->content!!} </div>
                            <div   align="right"> <b>{{$postshow->postBy->name}}</b> </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
