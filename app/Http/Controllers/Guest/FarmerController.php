<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Farmer;
use App\Models\FarmProductType;
use App\Models\Picture;

class FarmerController extends Controller
{

    public function __construct(
        Product $productModel,
        User $userModel,
        FarmProductType $farmProductTypeModel,
        Picture $pictureModel,
        Farmer $farmerModel,

    ) {
        $this->products = $productModel;
        $this->users = $userModel;
        $this->farm_product_types = $farmProductTypeModel;
        $this->pictures = $pictureModel;
        $this->product_details = $productModel;
        $this->farmers = $farmerModel;
    }
    public function index($id)
    {
        $farmer = $this->farmers->where('id', $id)->first();
        $farmer_id = $farmer->id;
        $product = $this->products->where('farmer_id', $farmer_id)->paginate(12);
        $count_product = $farmer->products->count();
        $new_products = $this->products->where('farmer_id', $farmer_id)->orderBy('id', 'DESC')->limit(4)->get();
        return view('guest.seller.index', compact('product', 'farmer', 'count_product', 'new_products', 'farmer_id'));
    }
    public function filter(Request $request, $id)
    {
        $farmer = $this->farmers->where('id', $id)->first();
        $farmer_id = $farmer->id;
        $count_product = $farmer->products->count();
        $validate_data = $request->validate(
            [
                'express' => 'nullable',
                'top_level' => 'nullable',
                'last_level' => 'nullable'
            ]
        );
        $express = $request->get('express');
        $toplevel = $request->get('top_level');
        $lastlevel = $request->get('last_level');

        if ($toplevel == null && $lastlevel == null) {
            $products = $this->products
                ->where('farmer_id', $farmer_id)
                ->whereIn('express_id', $express)
                ->paginate(12);
        } elseif ($express == null) {
            $products = $this->products
                ->where('farmer_id', $farmer_id)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->paginate(12);
        } else {
            $products = $this->products
                ->where('farmer_id', $farmer_id)
                ->paginate(12);
        }
        return view('guest.seller.filter', compact('farmer', 'products', 'count_product', 'farmer_id'));
    }
    public function farmerOrderBy(Request $request, $id)
    {
        $farmer = $this->farmers->where('id', $id)->first();
        $farmer_id = $farmer->id;
        $count_product = $farmer->products->count();
        $validate_data = $request->validate(
            [
                'choose' => 'nullable'
            ]
        );
        $choose = $request->get('choose');

        if ($choose == 0) {
            $product = $this->products->where('farmer_id', $farmer_id)->orderBy('id', 'DESC')->paginate(12);
        } elseif ($choose == 1) {
            $product = $this->products->where('farmer_id', $farmer_id)->orderBy('price', 'DESC')->paginate(12);
        } else {
            $product = $this->products->where('farmer_id', $farmer_id)->orderBy('price', 'ASC')->paginate(12);
        }
        return view('guest.seller.order-by', compact('farmer', 'product', 'count_product', 'farmer_id'));
    }
}