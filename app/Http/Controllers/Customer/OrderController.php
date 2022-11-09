<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
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
use App\Helper\Cart;

class OrderController extends Controller
{
    public function __construct(OrderDetail $orderdetailModel,Order $orderModel,Region $regionModel,Province $provinceModel,District $distrctModel,Ward $wardModel,Product $productModel, Express $expressModel, Farmer $farmerModel, User $userModel )
    {
        $this->product=$productModel;
        $this->express=$expressModel;
        $this->farmer=$farmerModel;
        $this->user=$userModel;
        $this->province=$provinceModel;
        $this->ward=$wardModel;
        $this->district=$distrctModel;
        $this->region=$regionModel;
        $this->order=$orderModel;
        $this->orderdetail=$orderdetailModel;
    }
    public function index(Request $request,$id){
        $id_user=auth::user()->id;
        $customer=$this->user->where("id",$id_user)->get();
        // foreach($request->session()->get('Cart')->farmers[$id] as $farmer){
        //     $id_farmer=$farmer['productInfo']->farmer_id;
            
        // };
        $name_farmer=$this->farmer->where('id',$id)->get('name');
        $region_customer=auth::user()->ward->district->province->region->id;
        $user_id=$this->farmer->where('id',$id)->get('user_id');
        $ward_id=$this->user->whereIn('id',$user_id)->get('ward_id');
        $district_id=$this->ward->whereIn('id',$ward_id)->get('district_id');
        $province_id=$this->district->whereIn('id',$district_id)->get('province_id');
        $region_farmer=$this->province->whereIn('id',$province_id)->get('id');
        if('region_customer' == 'region_farmer' ){
            $express=30000;
        }
        else{
            $express=50000;
        }
        $farmers=$request->session()->get('Cart')->farmers[$id];
        //dd($farmers);
        return view('customer.cart.checkout',compact('customer','express','name_farmer','farmers'));
    }
    public function store (Request $request,$id){
         //dd($request);
        $validate_order = $request->validate(
            [
                'totals' => 'required',
                'express_id' => 'required',
                'reason_cancel'=> 'nullable',
                'note' => 'nullable',
                'dilivery_date' =>'nullable'
            ]
        );
            $farmer=$request->session()->get('Cart')->farmers[$id];
            $product_id=$farmer['productInfo']->id;
            $quantity=$farmer['quanty'];
            $farmer_id=$farmer['productInfo']->farmer_id;
        
        
        $express=$request->get('express_id');
        //dd($express);
        if($express == 50000){
            $validate_order['express_id']=1;
        }
        else{
            $validate_order['express_id']=2;
        }
        
        $validate_order['user_id']=auth::user()->id;
        $validate_order['status_id']=1;
        $validate_order['profit']=$request->get('totals')*1/100;
        $order=$this->order->create($validate_order);

        $order_id = $order->id;
       
            $product_id=$farmer['productInfo']->id;
            $this->orderdetail->create([
            'quantity' => $quantity,
            'order_id' => $order_id,
            'product_id' => $product_id
        ]);
        
        $newCart =$request->session()->get('Cart');
        $newCart ->DeleteCart($id);
        
        return redirect()->route('customer.orders.index');
    }

    public function customer_order(){
        $id_orders=auth::user()->orders->pluck('id');
        $orders=auth::user()->orders->all(); 
        $confirm=$this->order->where('status_id','1')->whereIn('id',$id_orders)->get();

        $pickup=$this->order->where('status_id','2')->whereIn('id',$id_orders)->get();
        
        $delivering=$this->order->where('status_id','3')->whereIn('id',$id_orders)->get();

        $cancelled=$this->order->where('status_id','4')->whereIn('id',$id_orders)->get();

        $cancel=$this->order->where('status_id','6')->whereIn('id',$id_orders)->get();

        $complete=$this->order->where('status_id','5')->whereIn('id',$id_orders)->get();


        return view('customer.user.order',compact('cancel','orders','confirm','pickup','delivering','complete','cancelled'));
    }
    public function update_complete($id){
        $order = $this->order->findOrFail($id);
        $status['status_id']=5;
        $order->update($status);
        return redirect()->route('customer.orders.index');
    }
    public function cancel(Request $request,$id){
        $validate_order = $request->validate(
            [
                'reason_cancel'=>'required'
            ]
        );
        $order = $this->order->findOrFail($id);
        $validate_order['status_id']=6;
        $order->update($validate_order);
        return redirect()->route('customer.orders.index');
        
    }
}
