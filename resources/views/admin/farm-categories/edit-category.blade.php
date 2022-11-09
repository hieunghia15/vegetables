@extends('admin.layout',[ 'title' => __($title ?? 'Sửa danh mục nông sản')])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Sửa danh mục nông sản</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <h5>Nhập danh mục nông sản</h5>
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
                                        <form
                                            action="{{ route('admin.farm-product-types.update', ['id' => $farm_product_type->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="text" name="name" value="{{ $farm_product_type->name }}"
                                                class="form-control" id="slug" onkeyup="ChangeToSlug();">
                                                <input type="hidden" class="form-control" name="product_type_slug" id="convert_slug"
                                                value="{{ $farm_product_type->product_type_slug}}">
                                                <br>
                                            <div class="col-12">
                                                <span>Ảnh danh mục</span>
                                                <div class="form-group">
                                                    <img src="../../../{{$farm_product_type->thumbnail }}" width="20%">
                                                </div>
                                                <input type="file" name="thumbnail" value="{{ $farm_product_type->thumbnail }}" id="imgInp">
                                                <br>
                                                <p>Xem trước</p>
                                                <img id="preview" width="25%" />
                                            </div>
                                            <br>
                                            <button value="submit" class="btn btn-primary">Cập nhật</button>
                                            <button type="reset" class="btn btn-primary">Nhập lại</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
