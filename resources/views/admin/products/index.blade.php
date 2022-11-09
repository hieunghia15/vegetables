@extends('admin.layout',[ 'title' => __($title ?? 'Danh sách nông sản')])
@section('main')
    <div class="nk-content">
        <div class="container-fluid">
           @livewire('farm-product-searching')
        </div>
    @endsection
