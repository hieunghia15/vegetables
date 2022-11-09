@extends('admin.layout',[ 'title' => __($title ?? 'Cập nhật nông sản')])
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
                        <h5 class="nk-block-title">Cập nhật nông sản</h5>
                        <div class="nk-block-des">
                            <p>Thay đổi các thông tin</p>
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
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" class="form-control" name="farmer_id" value="{{ $user }}">
                        <input type="hidden" class="form-control" name="is_actived" value="1">
                        <div class="nk-block">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Tên nông sản</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="slug"
                                            onkeyup="ChangeToSlug();" placeholder="Nhập tên nông sản"
                                            value="{{ $product->name }}" required>
                                    </div>
                                    <input type="hidden" class="form-control" name="product_slug" id="convert_slug"
                                        value="{{ $product->product_slug }}">
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label">Phương pháp trồng</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="planting_methods"
                                            placeholder="Nhập phương pháp trồng"
                                            value="{{ $product->planting_methods }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Mô tả</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="description" id="editor"
                                            placeholder="Nhập mô tả sản phẩm" value="{{ $product->description }}"
                                            required>{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Giá</label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="1000" step="any" class="form-control" name="price"
                                            placeholder="Nhập giá" value="{{ $product->price }}" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label">Tồn kho</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="inventory"
                                            placeholder="Nhập số lượng hàng còn tồn kho"
                                            value="{{ $product->inventory }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Hình thức đóng gói</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="pack"
                                            placeholder="Vd: túi, hộp,..." value="{{ $product->pack }}" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label">Phương thức vận chuyển</label>
                                    <div class="form-control-wrap">
                                        @if ($product->express_id != null)
                                        <select class="form-control" name="express_id">
                                            <option selected="selected" value="{{ $product->express_id }}">
                                                {{ $product->express->name }}</option>
                                            @foreach ($express as $expresses)
                                            <option value="{{ $expresses->id }}">
                                                {{ $expresses->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" name="express_id">
                                            @foreach ($express as $expresses)
                                            <option value="{{ $expresses->id }}">
                                                {{ $expresses->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Quy mô</label>
                                    <div class="form-control-wrap">
                                        @if ($product->scale_id != null)
                                        <select class="form-control" name="scale_id">
                                            <option selected="selected" value="{{ $product->scale_id }}">
                                                {{ $product->scale->productivity }}</option>
                                            @foreach ($scale as $scales)
                                            <option value="{{ $scales->id }}">
                                                {{ $scales->productivity }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" name="scale_id">
                                            @foreach ($scale as $scales)
                                            <option value="{{ $scales->id }}">
                                                {{ $scales->productivity }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label">Đơn vị tính</label>
                                    <div class="form-control-wrap">
                                        @if ($product->unit_id != null)
                                        <select class="form-control" name="unit_id">
                                            <option selected="selected" value="{{ $product->unit_id }}">
                                                {{ $product->unit->name }}</option>
                                            @foreach ($unit as $units)
                                            <option value="{{ $units->id }}">
                                                {{ $units->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" name="unit_id">
                                            @foreach ($unit as $units)
                                            <option value="{{ $units->id }}">
                                                {{ $units->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Trọng lượng</label>
                                    <div class="form-control-wrap">
                                        <input type=number step='0.1' class="form-control" name="weight"
                                            placeholder="Nhập trọng lượng" value="{{ $product->weight }}" required>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label class="form-label" for="category">Danh mục nông sản</label>
                                    <div class="form-control-wrap">
                                        @if ($product->farm_product_type_id != null)
                                        <select class="form-control" name="farm_product_type_id">
                                            <option selected="selected" value="{{ $product->farm_product_type_id }}">
                                                {{ $product->farmProductType->name }}</option>
                                            @foreach ($farm_product_type as $farm_product_types)
                                            <option value="{{ $farm_product_types->id }}">
                                                {{ $farm_product_types->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" name="farm_product_type_id">
                                            @foreach ($farm_product_type as $farm_product_types)
                                            <option value="{{ $farm_product_types->id }}">
                                                {{ $farm_product_types->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">Ảnh sản phẩm</label>
                                    <div class="form-group">
                                        <img src="../../../{{ $product->thumbnail }}" width="40%">
                                    </div>
                                    <input type='file' accept="image/*" id="imgInp" class="form-control"
                                        name="thumbnail" value="{{ $product->thumbnail }}">
                                    <p>Xem trước</p>
                                    <img id="preview" width="25%" />
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label">Thư viện ảnh sản phẩm</label>
                                    <div class="form-group">
                                        @foreach ($product->pictures as $picture)
                                        <img src="../../../{{ $picture->url }}" width="40%">
                                        @endforeach
                                    </div>
                                    <input type="file" class="form-control" name="url[]" value="{{ $picture->url }}"
                                        multiple>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit"><span>Cập nhật</span></button>
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
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection