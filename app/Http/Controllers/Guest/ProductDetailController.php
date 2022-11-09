<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Farmer;
use App\Models\FarmProductType;
use App\Models\Picture;
use App\Models\Express;

class ProductDetailController extends Controller
{
    public function __construct(
        Product $productModel,
        User $userModel,
        FarmProductType $farmProductTypeModel,
        Picture $pictureModel,
        Express $expressModel

    ) {
        $this->products = $productModel;
        $this->users = $userModel;
        $this->farm_product_types = $farmProductTypeModel;
        $this->pictures = $pictureModel;
        $this->product_details = $productModel;
        $this->express = $expressModel;
    }

    public function productDetail($product_slug)
    {
        $products = $this->products->where('product_slug', $product_slug)->first();
        $picture =  $products->pictures->all();
        $product_details = $this->products->inRandomOrder()->limit(12)->get();
        $farmer_id = $products->farmer->id;
        $farmer_product = $this->products->where('farmer_id', $farmer_id)->get();
        $count_product = $farmer_product->count();
        $similar_product = $this->products->where('farmer_id', $farmer_id)->inRandomOrder()->limit(4)->get();
        return view('guest.product.detail', compact('products', 'picture', 'product_details', 'count_product', 'similar_product'));
    }
}
