<?php
namespace App\Helper;
class Cart{
    public $farmers =null;
    public $totalQuanty =0;
    public function __construct($cart)
    {
        if($cart){
            $this->farmers=$cart->farmers;
            $this->totalQuanty =$cart->totalQuanty;
        }
    }

    public function AddCart($product, $id,$farmer_id){
        $newFarmer=['quanty' => 0,'price' => $product->price, 'productInfo'=>$product];
            if($this->farmers){
                if(array_key_exists($farmer_id, $this->farmers)){
                    $newFarmer=$this->farmers[$farmer_id];
                }
        }
        
        $newFarmer['quanty']++;
        $newFarmer['price']=$newFarmer['quanty'] * $product->price;
        $this->farmers[$farmer_id]=$newFarmer;
        $this->totalQuanty++;
    }
    public function DeleteCart($farmer_id){
        $this->totalQuanty-= $this->farmers[$farmer_id]['quanty'];
        unset($this->farmers[$farmer_id]);
    }
    public function UpdateCart($id, $quanty){
        $this->totalQuanty -=  $this->farmers[$id]['quanty'];
        $this->farmers[$id]['quanty']=$quanty;
        $this->farmers[$id]['price'] = $quanty * $this->farmers[$id]['productInfo']->price;

        $this->totalQuanty +=  $this->farmers[$id]['quanty'];
    }
}