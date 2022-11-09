<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Farmer;


class BlogController extends Controller
{
    public function __construct(User $userModel, Post $postModel, Category $categoryModel, Farmer $farmerModel)
    {
        $this->users = $userModel;
        $this->posts = $postModel;
        $this->categories = $categoryModel;
        $this->farmers = $farmerModel;
    }
    public function index($id)
    {
        $user_id = $this->farmers->where('id', $id)->first()->user_id;
        $farmer_id = $this->farmers->where('id', $id)->first()->id;
        $categories = $this->categories->where('farmer_id', $id)->get();
        $posts = $this->posts->where('user_id', $user_id)->paginate(5);;
        $new_posts = $this->posts->where('user_id', $user_id)->latest()->take(4)->get();
        return view('guest.posts.index', compact('categories', 'posts', 'new_posts', 'farmer_id'));
    }
    public function categoryPost($category_slug)
    {
        $categories = $this->categories
            ->where('category_slug', $category_slug)
            ->get();
        $category_id = $this->categories->where('category_slug', $category_slug)->first()->id;
        $posts = $this->posts
            ->where('is_actived', 1)
            ->where('category_id', $category_id)
            ->paginate(5);
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();
        return view('guest.posts.category', compact('categories', 'posts', 'new_posts'));
    }
    public function read($post_slug)
    {
        $posts = $this->posts->where('is_actived', 1)
            ->where('post_slug', $post_slug)
            ->first();
        $category_id = $posts->category_id;
        $categories = $this->categories
            ->where('id', $category_id)
            ->get();
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();
        return view('guest.posts.post-detail', compact('posts', 'categories', 'new_posts'));
    }
}