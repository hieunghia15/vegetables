<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <center><div class="nk-sidebar-brand mt-2">
            <a href="{{route('admin.index')}}">
                <h5>NÔNG SẢN<br>
                    VIỆT</h5>
            </a>
        </div></center>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Trang chủ</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.sales.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                            <span class="nk-menu-text">Phân tích thống kê</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Quản lý</h6>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">Nông sản</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.products.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách nông sản</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.farm-product-types.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh mục nông sản</span></a>
                            </li>
                        </ul>
                    </li>
                    @can('assign')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Người dùng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.users.permission')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách người dùng</span></a>
                            </li>                       
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-property"></em></span>
                            <span class="nk-menu-text">Quản trị hệ thống</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.permissions.role')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách vai trò</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.permissions.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách cấp quyền</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.permissions.role-permission')}}" class="nk-menu-link"><span class="nk-menu-text">Cấp quyền vai trò</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni ni-bag"></em></span>
                            <span class="nk-menu-text">Đơn hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.orders.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách đơn hàng</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.orders.complete')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách đơn hàng - Hoàn thành</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.orders.canceled')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách đơn hàng - Đã hủy</span></a>
                            </li>
                        </ul>
                    </li>
                   
                    @can('assign')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-grid-alt-fill"></em></span>
                            <span class="nk-menu-text">Nông dân</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.farmers.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách nông dân</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.farmers.unconfirmed')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách nông dân - Chưa xác nhận</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.farmers.blocked')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách nông dân - Khóa</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.farmers.reported')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách nông dân - Báo cáo</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Bài viết</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.posts.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách bài viết</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.posts.unconfirmed')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách bài viết - Chưa duyệt</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.posts.blocked')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách bài viết - Khóa</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.posts.reported')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách bài viết - Báo cáo</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.posts.categories')}}" class="nk-menu-link"><span class="nk-menu-text">Loại bài viết</span></a>
                            </li>
                        </ul>
                    </li>                 
                    @can('assign')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Vận chuyển</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.expresses.index')}}" class="nk-menu-link"><span class="nk-menu-text">Phương thức vận chuyển</span></a>
                            </li>

                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">Chi tiết </span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.scales.index')}}" class="nk-menu-link"><span class="nk-menu-text">Quy mô</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.units.index')}}" class="nk-menu-link"><span class="nk-menu-text">Đơn vị</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('assign')                      
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Báo cáo vi phạm</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.type-reports.index')}}" class="nk-menu-link"><span class="nk-menu-text">Loại báo cáo</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.ad-report.index')}}" class="nk-menu-link"><span class="nk-menu-text">Báo cáo</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>
