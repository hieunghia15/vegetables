<?php

namespace App\Http\Controllers\Customer;

use App\Helper\Cart;
use App\Helper\Farmers;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redis;
use Session;

class CartController extends Controller
{
    public function __construct(Product $productModel,Farmer $farmerModel)
    {
        $this->product=$productModel;
        $this->farmer=$farmerModel;
    }
    public  function addCart(Request $request,$id){
        
        $product=$this->product->findOrFail($id);
        $farmer_id=$product->farmer_id;
        if($product  != null){
            //3 ngôi
            //gio hang hiện tại 
            $oldcart = Session('Cart') ? Session ('Cart')  : null;
            //gio hang sau khi thêm
            $newCart = new Cart($oldcart);
            $newCart->AddCart($product, $id,$farmer_id);
            $request->Session()->put('Cart', $newCart);
        }
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }
    public  function showCart(Request $request){
        $newCart=$request->session()->get('Cart');
        return view('customer.cart.index'); 
    }
    public function deleteCart(Request $request,$id){
        //dd($id);
        $oldcart = Session('Cart') ? Session ('Cart')  : null;
        $newCart = new Cart($oldcart);
        $newCart ->DeleteCart($id);
        if(count($newCart->farmers)>0){
            $request->Session()->put('Cart', $newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
            
        
        return redirect()->back(); 
    }

    public function saveCart(Request $request, $id){
        $product=$this->product->findOrFail($id);
        $farmer_id=$product->farmer_id;
        $validate_data=$request->validate([
            'quanty'
        ]);
        $quanty=$request->get('quanty');
        //dd($quanty);
        $oldcart = Session('Cart') ? Session ('Cart')  : null;
        $newCart = new Cart($oldcart);
        $newCart ->UpdateCart($farmer_id, $quanty);
        $request->Session()->put('Cart', $newCart);   
        ///dd($newCart); 
        return redirect()->back();   
    }
    public function updateAll(Request $request){
        
        $data=$request->data;
        foreach($data as $item){
            $oldcart = Session('Cart') ? Session ('Cart')  : null;
            $newCart = new Cart($oldcart);
            $newCart ->UpdateCart($item["id"], $item["quanty"]);
            $request->Session()->put('Cart', $newCart);
        }
       
       
    }
    
}
