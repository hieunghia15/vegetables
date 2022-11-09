<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Farmer;
use App\Models\FarmProductType;



class ProductShowController extends Controller
{
    public function __construct(
        Product $productModel,
        User $userModel,
        FarmProductType $farmProductTypeModel,

    ) {
        $this->products = $productModel;
        $this->product_news = $productModel;
        $this->users = $userModel;
        $this->farm_product_types = $farmProductTypeModel;
    }

    public function index()
    {
        $productTypes = $this->farm_product_types->all();
        $products = $this->products->inRandomOrder()->limit(12)->get();

        $product_news = $this->products->orderBy('id', 'desc')->limit(12)->get();

        return view('guest.layout', compact('products', 'product_news', 'productTypes'));
    }

}
