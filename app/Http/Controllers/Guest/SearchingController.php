<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Farmer;
use App\Models\Product;
use App\Models\FarmProductType;
use App\Models\Category;
use App\Models\Post;


class SearchingController extends Controller
{
    public function __construct(User $userModel, Product $productModel, FarmProductType $farmProductTypeModel, Farmer $farmerModel, Post $postModel, Category $categoryModel,)
    {
        $this->users = $userModel;
        $this->products = $productModel;
        $this->farmers = $farmerModel;
        $this->farmProductTypes = $farmProductTypeModel;
        $this->posts = $postModel;
        $this->categories = $categoryModel;
    }
    public function searchProduct(Request $request)
    {
        $search = $_GET['search'];
        $product = Product::where('name', 'LIKE', '%' . $search . '%')
            ->latest()
            ->paginate(20);
        return view('guest.searching.search-product', compact('search', 'product'));
    }
    public function searchPost(Request $request)
    {
        $search = $_GET['search'];
        $categories = $this->categories->where('farmer_id', NULL)->get();
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();

        $posts = Post::where('title', 'LIKE', '%' . $search . '%')
            ->latest()
            ->paginate(5);
        return view('guest.searching.search-post', compact('search', 'posts', 'categories', 'new_posts'));
    }
}