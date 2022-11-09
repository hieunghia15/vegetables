<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class NewsController extends Controller
{
    public function __construct(User $userModel, Post $postModel, Category $categoryModel)
    {
        $this->users = $userModel;
        $this->posts = $postModel;
        $this->categories = $categoryModel;
    }
    public function index()
    {
        $categories = $this->categories->where('farmer_id', NULL)->get();
        $posts = $this->posts->where('staff_id', 1)->paginate(5);
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();
        return view('guest.post-admin.index', compact('categories', 'posts', 'new_posts'));
    }
    public function categoryPost($category_slug)
    {

        $categories = $this->categories
            ->where('farmer_id', NULL)
            ->get();
        $category_id = $this->categories->where('category_slug', $category_slug)->first()->id;
        $posts = $this->posts
            ->where('is_actived', 1)
            ->where('category_id', $category_id)
            ->paginate(5);
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();
        return view('guest.post-admin.category', compact('categories', 'posts', 'new_posts'));
    }
    public function read($post_slug)
    {
        $posts = $this->posts->where('is_actived', 1)
            ->where('post_slug', $post_slug)
            ->first();
        $categories = $this->categories
            ->where('farmer_id', NULL)
            ->get();
        $new_posts = Post::where('is_actived', 1)
            ->latest()->take(4)->get();
        return view('guest.post-admin.post-detail', compact('posts', 'categories', 'new_posts'));
    }
}