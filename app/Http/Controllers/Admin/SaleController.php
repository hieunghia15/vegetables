<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Auth;

class SaleController extends Controller
{
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $products = Product::all()->count();
            $farmers = Farmer::all()->count();
            $customers = User::where('authentication', NULL)
                ->where('username', '<>', 'admin')
                ->count();
            $totals = Order::sum('totals');
            return view('admin.sales.index', compact('products', 'farmers', 'customers', 'totals'));
        } elseif ($role == 'farmer') {
            $id_farmer = Auth::user()->farmer->id;
            $products = Product::where('farmer_id', $id_farmer)->count();
            $id_product = Product::where('farmer_id', $id_farmer)->get('id');
            $orders_detail = OrderDetail::whereIn('product_id', $id_product)->get();
            $id_order = OrderDetail::whereIn('product_id', $id_product)->get('order_id');
            $orders = Order::whereIn('id', $id_order)->get();
            $totals =  $orders->sum('totals');
            return view('admin.sales.index', compact('products', 'totals'));
        }
    }
}