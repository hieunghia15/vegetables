@extends('admin.layout' , [ 'title' => __($title ?? 'Danh mục nông sản')])
@section('main')
    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    <span><a href="" class="text-dark"><i
                                                class="fa-solid fa-house"></i></a></span>&ensp;&sol;&ensp;
                                    <span><a href="" class="active">Danh mục nông sản</a></span>
                                </h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04"
                                                        placeholder="Tìm kiếm nhanh bằng tên">
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="{{ route('admin.farm-product-types.create') }}"
                                                    data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Thêm danh mục nông sản</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">

                        <div class="row g-gs">
                            @foreach ($farm_product_types as $farm_product_types)
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="card card-bordered product-card">
                                        <div class="product-thumb">
                                            <a href="">
                                                <img class="card-img-top" src="{{ $farm_product_types->thumbnail }}"
                                                    alt="Rau, củ quả">

                                            </a>
                                        </div>
                                        <div class="card-inner text-center">
                                            <h5 class="product-title"><a href="">{{ $farm_product_types->name }}</a>
                                            </h5>
                                            <ul class="product-actions">
                                                <li><a
                                                        href="{{ route('admin.farm-product-types.edit', $farm_product_types->id) }}"><em
                                                            class="icon ni ni-edit"></em></a></li>

                                                <li><a
                                                        href="{{ route('admin.farm-product-types.destroy', $farm_product_types->id) }}"><em
                                                            class="icon ni ni-trash"></em></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                        data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Thêm danh mục nông sản</h5>
                                <div class="nk-block-des">
                                    <p>Vui lòng điền đầy đủ thông tin<sup class="text-danger">*</sup></p>
                                </div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="row g-3">

                                <form method="POST" action="{{ route('admin.farm-product-types.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Tên danh mục</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" id="slug" onkeyup="ChangeToSlug();">
                                            </div>
                                            <input type="hidden" class="form-control" name="product_type_slug"
                                                id="convert_slug" value="{{ old('product_type_slug') }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Ảnh danh mục</label>
                                            <input type="file" class="form-control" id="imgInp" name="thumbnail">
                                            <br>
                                            <span>Xem trước</span>
                                            <img id="preview" width="25%" />
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
