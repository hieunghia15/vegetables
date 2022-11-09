<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Express;
use App\Models\Farmer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\Region;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    public function __construct(OrderDetail $orderdetailModel, Order $orderModel, Region $regionModel, Province $provinceModel, District $distrctModel, Ward $wardModel, Product $productModel, Express $expressModel, Farmer $farmerModel, User $userModel)
    {
        $this->product = $productModel;
        $this->express = $expressModel;
        $this->farmer = $farmerModel;
        $this->user = $userModel;
        $this->province = $provinceModel;
        $this->ward = $wardModel;
        $this->district = $distrctModel;
        $this->region = $regionModel;
        $this->order = $orderModel;
        $this->orderdetail = $orderdetailModel;
    }
    public function order()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $orders = $this->order->all();
            $orders_detail = $this->orderdetail->all();
        } elseif ($role == 'farmer') {

            $id_farmer = Auth::user()->farmer->id;
            $id_product = $this->product->where('farmer_id', $id_farmer)->get('id');
            $orders_detail = $this->orderdetail->whereIn('product_id', $id_product)->get();
            $id_order = $this->orderdetail->whereIn('product_id', $id_product)->get('order_id');
            $orders = $this->order->whereIn('id', $id_order)->get();
        }
        return view('admin.orders.index', compact('orders', 'orders_detail'));
    }

    public function update_pickup(Request $request, $id)
    {
        $validate_data = $request->validate(
            [
                'delivery_date' => 'required'
            ]
        );

        $order = $this->order->findOrFail($id);
        $validate_data['status_id'] = 2;
        $order->update($validate_data);
        return redirect()->route('admin.orders.index');
    }
    public function update_delivering($id)
    {
        $order = $this->order->findOrFail($id);
        $status['status_id'] = 3;
        $order->update($status);
        return redirect()->route('admin.orders.index');
    }
    public function update_complete($id)
    {
        $order = $this->order->findOrFail($id);
        $status['status_id'] = 5;
        $order->update($status);
        return redirect()->route('admin.orders.index');
    }
    public function update_cancel($id)
    {
        $order = $this->order->findOrFail($id);
        $status['status_id'] = 4;
        $order->update($status);
        return redirect()->route('admin.orders.index');
    }

    public function complete()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $orders = $this->order->where('status_id', 5)->get();
            $id_order = $this->order->where('status_id', 5)->get('id');
            $order_detail = $this->orderdetail->where('order_id', $id_order);
        } elseif ($role == 'farmer') {

            $id_farmer = Auth::user()->farmer->get('id');
            $id_product = $this->product->whereIn('farmer_id', $id_farmer)->get('id');
            $detail = $this->orderdetail->whereIn('product_id', $id_product)->get();
            $id_order = $this->orderdetail->whereIn('product_id', $id_product)->get('order_id');
            $orders = $this->order->whereIn('id', $id_order)->where('status_id', '5')->get();
            $orders_id = $this->order->whereIn('id', $id_order)->where('status_id', '5')->get('id');
            $order_detail = $this->orderdetail->whereIn('order_id', $orders_id)->get();
        }
        //dd($orders);
        return view('admin.orders.complete', compact('orders', 'order_detail'));
    }
    public function canceled()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $orders = $this->order->where('status_id', 4)->get();
            $id_order = $this->order->where('status_id', 4)->get('id');
            $order_detail = $this->orderdetail->where('order_id', $id_order);
        } elseif ($role == 'farmer') {

            $id_farmer = Auth::user()->farmer->get('id');
            $id_product = $this->product->whereIn('farmer_id', $id_farmer)->get('id');
            $detail = $this->orderdetail->whereIn('product_id', $id_product)->get();
            $id_order = $this->orderdetail->whereIn('product_id', $id_product)->get('order_id');
            $orders = $this->order->whereIn('id', $id_order)->where('status_id', '4')->get();
            $orders_id = $this->order->whereIn('id', $id_order)->where('status_id', '4')->get('id');
            $order_detail = $this->orderdetail->whereIn('order_id', $orders_id)->get();
        }
        //dd($orders);
        return view('admin.orders.canceled', compact('orders', 'order_detail'));
    }
    public function show($id)
    {
        $orders = $this->order->where('id', $id)->get();
        $order_detail = $this->orderdetail->where('order_id', $id)->get();
        return view('admin.orders.show', compact('orders', 'order_detail'));
    }
}