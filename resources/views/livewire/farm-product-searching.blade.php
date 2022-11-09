<div>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            <span><a href="" class="text-dark"><i
                                        class="fa-solid fa-house"></i></a></span>&ensp;&sol;&ensp;
                            <span><a href="" class="active">Nông sản</a></span>
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-search"></em>
                                            </div>
                                            <input type="text" class="form-control" id="default-04"
                                                placeholder="Tìm kiếm..." wire:model="search">
                                        </div>
                                    </li>
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ route('admin.products.add') }}" class="btn btn-primary"><em
                                                class="icon ni ni-plus"></em><span>Thêm nông sản</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                <!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <div class="nk-tb-list">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <span>STT</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm"><span>Tên nông sản</span></div>
                                        <div class="nk-tb-col"><span>Mã nông sản</span></div>
                                        <div class="nk-tb-col"><span>Giá</span></div>
                                        <div class="nk-tb-col"><span>Tồn kho</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Danh mục</span></div>
                                        <div class="nk-tb-col tb-col-md">
                                            Gian hàng
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                        </div>
                                    </div>
                                    @foreach ($product as $key => $value)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <span>{{ $key + 1 }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="tb-product">
                                                    <img src="{{ $value->thumbnail }}" alt="{{ $value->name }}"
                                                        class="thumb">
                                                    <span class="title">{{ $value->name }}</span>
                                                </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">{{ $value->id }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span
                                                    class="tb-lead">{{ number_format($value->price) }}<sup>đ</sup></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">{{ $value->inventory }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span
                                                    class="tb-sub">{{ $value->farmProductType->name }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                {{ $value->farmer->name }}
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a
                                                                            href="{{ route('admin.products.edit', $value->id) }}"><em
                                                                                class="icon ni ni-edit"></em><span>Chỉnh
                                                                                sửa</span></a></li>
                                                                    <li><a
                                                                            href="{{ route('admin.products.show', $value->product_slug) }}"><em
                                                                                class="icon ni ni-eye"></em><span>Xem
                                                                                chi
                                                                                tiết</span></a></li>
                                                                    <li><a
                                                                            href="{{ route('admin.products.delete', $value->id) }}"><em
                                                                                class="icon ni ni-trash"></em><span>Xóa
                                                                                nông
                                                                                sản</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-inner float-right">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        @if ($links->links())
                                            {{ $links->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
