<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Express;
use App\Models\Farmer;
use App\Models\FarmProductType;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Support\Arr;

class FilterController extends Controller
{
    private $filters;
    public function  __construct(Ward $wardModel, District $distrctModel, Farmer $farmerModel, Province $provinceModel, User $userModel, Product $productModel, Express $expressModel, FarmProductType $producttypeModel)
    {
        $this->user = $userModel;
        $this->product = $productModel;
        $this->express = $expressModel;
        $this->productType = $producttypeModel;
        $this->province = $provinceModel;
        $this->farmer = $farmerModel;
        $this->ward = $wardModel;
        $this->district = $distrctModel;
    }
    public function index()
    {
        $productTypes = $this->productType->all();
        $express = $this->express->all();
        $user_id = $this->farmer->get('user_id');
        $ward_id = $this->user->whereIn('id', $user_id)->get('ward_id');
        $district_id = $this->ward->whereIn('id', $ward_id)->get('district_id');
        $province_id = $this->district->whereIn('id', $district_id)->get('province_id');
        $provinces = $this->province->whereIn('id', $province_id)->get();
        $get_product = $this->product->all();
        $get_farmer = $this->farmer->all();
        $getProduct = $this->product->limit(3)->get();
        return view('guest.product.farm-product-filter', compact('get_farmer','getProduct', 'provinces', 'get_product', 'productTypes', 'express'));
    }
    public function filter(Request $request)
    {
        $productTypes = $this->productType->all();
        $express = $this->express->all();
        $user_id = $this->farmer->get('user_id');
        $ward_id = $this->user->whereIn('id', $user_id)->get('ward_id');
        $district_id = $this->ward->whereIn('id', $ward_id)->get('district_id');
        $province_id = $this->district->whereIn('id', $district_id)->get('province_id');
        $provinces = $this->province->whereIn('id', $province_id)->get();
        $getProduct = $this->product->limit(3)->get();
        $validate_data = $request->validate(
            [
                'type' => 'nullable',
                'expr' => 'nullable',
                'province' => 'nullable',
                'top_level' => 'nullable',
                'last_level' => 'nullable'
            ]
        );
        $product_type = $request->get('type');
        $expre = $request->get('expr');
        $toplevel = $request->get('top_level');
        $lastlevel = $request->get('last_level');
        $province = $request->get('province');

        if ($expre == null && $province == null && $toplevel == null && $lastlevel == null) {
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->get();
        } elseif ($product_type == null && $province == null && $toplevel == null && $lastlevel == null) {
            $get_product = $this->product
                ->whereIn('express_id', $expre)
                ->get();
        } elseif ($expre == null && $product_type == null && $toplevel == null && $lastlevel == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farmer_id', $farmer)
                ->get();
        } elseif ($product_type == null && $toplevel == null && $lastlevel == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('express_id', $expre)
                ->whereIn('farmer_id', $farmer)
                ->get();
        } elseif ($expre == null  && $toplevel == null && $lastlevel == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('farmer_id', $farmer)
                ->get();
        } elseif ($province == null && $toplevel == null && $lastlevel == null) {
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('express_id', $expre)
                ->get();
        } elseif ($province == null  && $expre == null && $product_type == null) {
            $get_product = $this->product
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($product_type == null && $province == null) {
            $get_product = $this->product
                ->whereIn('express_id', $expre)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($toplevel == null && $lastlevel == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('express_id', $expre)
                ->whereIn('farmer_id', $farmer)
                ->get();
        } elseif ($product_type == null && $province == null) {
            $get_product = $this->product
                ->whereIn('express_id', $expre)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($expre == null && $province == null) {
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($expre == null && $product_type == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farmer_id', $farmer)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($product_type == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('express_id', $expre)
                ->whereIn('farmer_id', $farmer)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($expre == null) {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('farmer_id', $farmer)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } elseif ($province == null) {
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('express_id', $expre)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        } else {
            $district_id = $this->district->whereIn('id', $province)->get('id');
            $ward_id = $this->ward->whereIn('district_id', $district_id)->get('id');
            $user_id = $this->user->whereIn('ward_id', $ward_id)->get('id');
            $farmer = $this->farmer->whereIn('user_id', $user_id)->get('id');
            $get_product = $this->product
                ->whereIn('farm_product_type_id', $product_type)
                ->whereIn('express_id', $expre)
                ->whereIn('farmer_id', $farmer)
                ->whereBetween('price', [$toplevel, $lastlevel])
                ->get();
        }



        return view('guest.product.filter', compact('getProduct', 'get_product', 'productTypes', 'express', 'provinces'));
    }
    public function filter_two(Request $request)
    {
        $productTypes = $this->productType->all();
        $express = $this->express->all();
        $user_id = $this->farmer->get('user_id');
        $ward_id = $this->user->whereIn('id', $user_id)->get('ward_id');
        $district_id = $this->ward->whereIn('id', $ward_id)->get('district_id');
        $province_id = $this->district->whereIn('id', $district_id)->get('province_id');
        $provinces = $this->province->whereIn('id', $province_id)->get();
        $getProduct = $this->product->limit(3)->get();
        $validate_data = $request->validate(
            [
                'chose' => 'nullable'

            ]
        );
        $chosen = $request->get('chose');

        if ($chosen == 0) {
            $get_product = $this->product->orderBy('price', 'DESC')->get();
        } else {
            $get_product = $this->product->orderBy('price', 'asc')->get();
        }
        return view('guest.product.filter_two', compact('getProduct', 'get_product', 'productTypes', 'express', 'provinces'));
    }
}