@extends('admin.layout',[ 'title' => __($title ?? 'Cấp quyền cho vai trò')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Cấp quyền cho vai trò</h3>
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
                                        <div class="nk-tb-col tb-col-sm"><span>Tên vai trò</span></div>
                                        <div class="nk-tb-col"><span>Quyền hạn</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach ($role as $key => $value)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <span class="tb-sub">{{ $key+1 }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->name }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            @foreach ($value->permissions as $permission )
                                            <span class="tb-lead">{{ $permission->name }}</span>
                                            @endforeach
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
                                                                        href="{{route('admin.permissions.assign-permission',['id'=>$value->id])}}"><em
                                                                            class="icon ni ni-edit"></em><span>Cấp quyền</span></a></li>
                                                </li>                                              
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
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    <li class="page-item"><a class="page-link" href="#"><em
                                                class="icon ni ni-chevrons-left"></em></a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link"><em
                                                class="icon ni ni-more-h"></em></span></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><em
                                                class="icon ni ni-chevrons-right"></em></a></li>
                                </ul><!-- .pagination -->
                            </div>
                            <div class="g">
                                <div
                                    class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                    <div>Page</div>
                                    <div>
                                        <select class="form-select form-select-sm" data-search="on"
                                            data-dropdown="xs center">
                                            <option value="page-1">1</option>
                                            <option value="page-2">2</option>
                                            <option value="page-4">4</option>
                                            <option value="page-5">5</option>
                                            <option value="page-6">6</option>
                                            <option value="page-7">7</option>
                                            <option value="page-8">8</option>
                                            <option value="page-9">9</option>
                                            <option value="page-10">10</option>
                                            <option value="page-11">11</option>
                                            <option value="page-12">12</option>
                                            <option value="page-13">13</option>
                                            <option value="page-14">14</option>
                                            <option value="page-15">15</option>
                                            <option value="page-16">16</option>
                                            <option value="page-17">17</option>
                                            <option value="page-18">18</option>
                                            <option value="page-19">19</option>
                                            <option value="page-20">20</option>
                                        </select>
                                    </div>
                                    <div>OF 102</div>
                                </div>
                            </div><!-- .pagination-goto -->
                        </div><!-- .nk-block-between -->
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </div>
</div>
</div>
</div>
@endsection