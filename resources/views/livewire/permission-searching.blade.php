<div>
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Quyền hạn</h3>
                </div><!-- .nk-block-head-content -->
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
                                        <input type="text" class="form-control" id="default-04" placeholder="Tìm kiếm"
                                            wire:model="search">
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('admin.permissions.create-permission') }}"
                                        class="btn btn-primary d-md-inline-flex"><span>Thêm quyền hạn</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <div class="nk-tb-list">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check"><span>STT</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Tên</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach ($permission as $key => $permissions)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <span class="tb-sub">{{ $key + 1 }}</span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="tb-sub">{{ $permissions->name }}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="mr-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a
                                                                    href="{{ route('admin.permissions.edit-permission', [$permissions->id]) }}"><em
                                                                        class="icon ni ni-edit"></em><span>Chỉnh
                                                                        sửa</span></a></li>
                                            </li> <a
                                                href="{{ route('admin.permissions.destroy-permission', ['id' => $permissions->id]) }}"><em
                                                    class="icon ni ni-trash"></em><span>Xóa</span></a>
                                        </ul>
                                    </div>
                                </div>
                                </li>
                                </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    @endforeach
                </div><!-- .nk-tb-list -->
            </div>
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        @if ($links->links())
                            {{ $links->links() }}
                        @endif
                    </div>
                </div><!-- .nk-block-between -->
            </div>
        </div>
    </div>
</div>
