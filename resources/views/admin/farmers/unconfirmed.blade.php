@extends('admin.layout',[ 'title' => __($title ?? 'Danh sách nông dân - Chưa xác nhận')])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Danh sách nông dân - Chưa xác nhận</h3>
                            </div><!-- .nk-block-head-content -->
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
                                                        placeholder="Tìm kiếm...">
                                                </div>
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
                                            <div class="nk-tb-col tb-col-sm"><span>Họ tên</span></div>
                                            <div class="nk-tb-col"><span>Email</span></div>
                                            <div class="nk-tb-col"><span>Số điện thoại</span></div>
                                            <div class="nk-tb-col"><span>Vai trò</span></div>
                                            <div class="nk-tb-col"><span>Tình trạng</span></div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($non_farmer as $key => $value)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <span class="tb-sub">{{ $key + 1 }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $value->name }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead">{{ $value->email }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $value->phone }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    @foreach ($value->roles as $role)
                                                        <span class="tb-sub">{{ $role->name }}</span>
                                                    @endforeach
                                                </div>
                                                <div class="nk-tb-col">
                                                    <div class="form-group">
                                                        <form action="{{ route('admin.farmers.accept-farmer') }}"
                                                            method="POST">
                                                            @csrf
                                                            @if ($value->authentication == 'Đăng ký')
                                                                <select name="authentication"
                                                                    data-user_id="{{ $value->id }}"
                                                                    class="form-control authentication">
                                                                    <option selected="selected" value="Đăng ký">Đăng ký
                                                                    </option>
                                                                    <option value="Xác nhận">Xác nhận</option>
                                                                </select>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                </div>
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        {{ $non_farmer->links() }}
                                    </div><!-- .nk-block-between -->
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('.authentication').change(function() {
            const authentication = $(this).val();
            const user_id = $(this).data('user_id');
            $.ajax({
                url: "{{ route('admin.farmers.accept-farmer') }}",
                method: 'POST',
                data: {
                    authentication: authentication,
                    user_id: user_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert('Xác nhận nông dân thành công');
                }
            });
        })
    </script>
@endsection
