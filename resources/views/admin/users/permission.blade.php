@extends('admin.layout',[ 'title' => __($title ?? 'Danh sách người dùng')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            @livewire('user-searching')
        </div>
    </div>
</div>
@endsection