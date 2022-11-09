@extends('admin.layout',[ 'title' => __($title ?? 'Danh sách nông dân')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
           @livewire('farmer-searching')
        </div>
    </div>
</div>
@endsection