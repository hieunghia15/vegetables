@extends('admin.layout',[ 'title' => __($title ?? 'Thêm nông sản')])
@section('main')
    <style>
        .nk-block-head {
            margin-top: 50px;
            margin-bottom: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
            padding-right: 30px;
            background-color: #FFFFFF;
        }

    </style>
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head shadow">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Thêm nông sản</h5>
                            <div class="nk-block-des">
                                <p>Nhập các thông tin</p>
                            </div>
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
                            </div>
                        </div><!-- .nk-block-head -->
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="farmer_id" value="{{ $user }}">
                            <input type="hidden" class="form-control" name="is_actived" value="1">
                            <div class="nk-block">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Tên nông sản</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="name" id="slug"
                                                onkeyup="ChangeToSlug();" placeholder="Nhập tên nông sản"
                                                value="{{ old('name') }}" required>
                                        </div>
                                        <input type="hidden" class="form-control" name="product_slug" id="convert_slug"
                                            value="{{ old('product_slug') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Phương pháp trồng</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="planting_methods"
                                                placeholder="Nhập phương pháp trồng" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Mô tả</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" name="description" id="editor" placeholder="Nhập mô tả sản phẩm"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Giá</label>
                                        <div class="form-control-wrap">
                                            <input type="number" min="1000" step="any" class="form-control" name="price"
                                                placeholder="Nhập giá" value="{{ old('price') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Tồn kho</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="inventory"
                                                placeholder="Nhập số lượng hàng còn tồn kho"
                                                value="{{ old('inventory') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Hình thức đóng gói</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="pack"
                                                placeholder="Vd: túi, hộp,..." value="{{ old('inventory') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Phương thức vận chuyển</label>
                                        <div class="form-control-wrap">
                                            <select class="form-control" name="express_id">
                                                @foreach ($express as $expresses)
                                                    <option value="{{ $expresses->id }}">{{ $expresses->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Quy mô</label>
                                        <div class="form-control-wrap">
                                            <select class="form-control" name="scale_id">
                                                @foreach ($scale as $scales)
                                                    <option value="{{ $scales->id }}">{{ $scales->productivity }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Đơn vị tính</label>
                                        <div class="form-control-wrap">
                                            <select class="form-control" name="unit_id">
                                                @foreach ($unit as $units)
                                                    <option value="{{ $units->id }}">{{ $units->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Trọng lượng</label>
                                        <div class="form-control-wrap">
                                            <input type=number step='0.1' class="form-control" name="weight"
                                                placeholder="Nhập trọng lượng" value="{{ old('weight') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="form-label" for="category">Danh mục nông sản</label>
                                        <div class="form-control-wrap">
                                            <select class="form-control" name="farm_product_type_id">
                                                @foreach ($farm_product_type as $farm_product_types)
                                                    <option value="{{ $farm_product_types->id }}">
                                                        {{ $farm_product_types->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-label">Ảnh sản phẩm</label>
                                        <input type='file' accept="image/*" id="imgInp" class="form-control"
                                            name="thumbnail">
                                        <p>Xem trước</p>
                                        <img id="preview" width="25%" />
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">Thư viện ảnh sản phẩm</label>
                                        <input type="file" class="form-control" name="url[]" multiple>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit"><span>Thêm Mới</span></button>
                                    </div>
                                </div>
                            </div><!-- .nk-block -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
