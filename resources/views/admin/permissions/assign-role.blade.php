@extends('admin.layout',[ 'title' => __($title ?? 'Cấp vai trò')])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Cấp vai trò</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
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
                                        <h4>Người dùng hiện tại: {{ $user->name }}</h4>
                                        <div class="form-group">
                                        <form method="POST"
                                            action="{{ route('admin.permissions.insert-role', [$user->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('Patch')
                                            @if ($all_column_roles == null)
                                                <h6>Không có vai trò</h6>
                                            @else
                                                <h6></h6>
                                            @endif
                                            <h5>Chọn vai trò</h5>
                                            @foreach ($role as $roles)
                                                @if (isset($all_column_roles))
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            {{ $roles->id == $all_column_roles->id ? 'checked' : '' }}
                                                            type="checkbox" name="role[]" id="{{ $roles->id }}"
                                                            value="{{ $roles->name }}">
                                                        <label class="form-check-label" for="{{ $roles->id }}">
                                                            {{ $roles->name }}
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="role[]"
                                                            id="{{ $roles->id }}" value="{{ $roles->name }}">
                                                        <label class="form-check-label" for="{{ $roles->id }}">
                                                            {{ $roles->name }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <button type="submit" class="btn btn-primary">Cấp vai trò</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
