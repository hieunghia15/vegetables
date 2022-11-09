@extends('admin.layout',[ 'title' => __($title ?? 'Quản lý quyền hạn')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
           @livewire('permission-searching')
        </div><!-- .nk-block -->
    </div>
</div>
</div>
</div>
@endsection