@extends('admin.layout',[ 'title' => __($title ?? 'Chi tiết hóa đơn')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary"
                                href="print.blade.php" target="_blank"><em
                                    class="icon ni ni-printer-fill"></em></a>
                        </div><!-- .invoice-actions -->
                        <div class="invoice-wrap">
                            <div class="invoice-brand text-center">
                                <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                            </div>
                            @foreach($orders as $order)
                            @foreach($order_detail as $order_detail)
                            <div class="invoice-head">
                                <div class="invoice-contact">
                                    <span class="overline-title">Đơn hàng từ</span>
                                    <div class="invoice-contact-info">
                                        <h4 class="title">{{$order->user->name}}</h4>
                                        <ul class="list-plain">
                                            <li><i class="icon fa-solid fa-store"></i>
                                                <span>{{$order_detail->product->farmer->name}}</span>
                                            </li>
                                            <li><em class="icon ni ni-map-pin-fill"></em>
                                                <span>{{$order->user->ward->district->province->name}}</span>
                                            </li>
                                            <li>
                                                <em class="icon ni ni-call-fill"></em>
                                                <span>{{$order->user->phone}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-desc">
                                    <h3 class="title">Hóa đơn</h3>
                                    <ul class="list-plain">
                                        <li class="invoice-id"><span>{{$order->status->name}}</span></li>
                                        @if($order->status->id ==6)
                                        <li class="invoice-id"><span>{{$order->reason_cancel}}</span> </li>
                                        @endif
                                        <li class="invoice-id"><span>Mã hóa đơn</span>:<span>#{{$order->id}}</span></li>
                                        <li class="invoice-date"><span>Ngày
                                                đặt</span>:<span>{{$order->created_at->format('d/m/Y')}}</span></li>
                                        <li class="invoice-date"><span>Ngày
                                                nhận</span>:<span>{{$order->updated_at->format('d/m/Y')}}</span></li>
                                    </ul>
                                </div>
                            </div><!-- .invoice-head -->
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="w-150px">Mã nông sản</th>
                                                <th class="w-40">Tên nông sản</th>
                                                <th class="w-150px">Giá</th>
                                                <th class="w-150px">Số lượng</th>
                                                <th class="w-150px">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$order_detail->product->id}}</td>
                                                <td>{{$order_detail->product->name}}</td>
                                                <td>{{number_format($order_detail->product->price)}}đ</td>
                                                <td>{{$order_detail->quantity}}</td>
                                                <td>{{number_format($order_detail->product->price * $order_detail->quantity)}}đ
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Phí giao hàng</td>
                                                <td>{{number_format($order->express->price)}}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Tổng tiền</td>
                                                <td>{{number_format($order->totals)}}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Chiết khấu</td>
                                                <td>{{number_format($order->profit)}}đ</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="nk-notes ff-italic fs-12px text-soft">Hóa đơn được tạo trên máy tính và
                                        hợp lệ không cần chữ ký và con dấu.</div>
                                </div>
                            </div><!-- .invoice-bills -->
                            @endforeach
                            @endforeach
                        </div>
                    </div><!-- .invoice -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection