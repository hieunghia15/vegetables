<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    private  $posts;

    public function __construct(User $userModel, Post $postModel, Category $categoryModel)
    {
        $this->user = $userModel;
        $this->post = $postModel;
        $this->category = $categoryModel;
    }
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $user_id = Auth::user()->id;
            $posts = $this->post->where('is_actived', 1)->where('user_id', $user_id)->get();
        } elseif ($role == 'farmer') {
            $user_id = Auth::user()->id;

            $posts = $this->post->where('is_actived', 1)->where('user_id', $user_id)->get();
        }
        return view('admin.posts.index', compact('posts'));
    }
    public function show($id)
    {
        $postshow = $this->post->findOrFail($id);
        return view('admin.posts.show', compact('postshow'));
    }
    public function create()
    {
        $role = Auth::user()->getRoleNames()->first();
        if($role == 'admin'){
             $categories=$this->category->where('farmer_id', Null)->get();
        }

        elseif($role == 'farmer') {
            $farmer_id = Auth::user()->farmer->id;
            $categories=$this->category->where('farmer_id', $farmer_id)->get();

        }
         return view('admin.posts.store',compact('categories'));
    }
    public function store(Request $request)
    {
        $validate_data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'post_slug' => 'required',
                'category_id' => 'required',
                'staff_id' => 'nullable',
                'user_id',
                'is_actived'=> 'nullable',
                'thumbnail' => 'required|image'
            ]
        );
        $get_image = $request->file('thumbnail');
        $path = 'image/post/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $link = $get_image->move($path, $new_image);
        $validate_data['thumbnail'] = $link;
        $validate_data['category_id'] =  $request['category_id'];
        $validate_data['user_id'] = auth::user()->id;
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin' || $role == 'farmer') {
            $validate_data['is_actived'] = 1;
            $validate_data['staff_id'] = auth::user()->id;
            $validate_data['is_actived'] = 1;
        }
        $this->post->create($validate_data);
        return redirect()->route(('admin.posts.index'));
    }
    public function edit($id)
    {
        $post = $this->post->findOrFail($id);
        $role = Auth::user()->getRoleNames()->first();
        if($role == 'admin'){
             $categories=$this->category->where('farmer_id', Null)->get();
        }

        elseif($role == 'farmer') {
            $farmer_id = Auth::user()->farmer->id;
            $categories=$this->category->where('farmer_id', $farmer_id)->get();

        }
        $is_actived = $post->is_actived;
        // dd($is_actived);

        return view('admin.posts.edit', compact('post', 'categories', 'is_actived'));
    }
    public function update(Request $request, $id)
    {
        $validate_data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'post_slug' => 'required',
            'category_id' => 'required',
            'staff_id' => 'nullable',
            'user_id',
            'is_actived'=> 'required',
            'thumbnail'
        ]);

        $post = $this->post->findOrFail($id);
        $old_thumbnail = $post->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $get_image = $request->file('thumbnail');
            $path = 'image/post/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $link = $get_image->move($path, $new_image);
            $validate_data['thumbnail'] = $link;
        }

        $post->update($validate_data);
        return redirect()->route(('admin.posts.index'));
    }


    public function delete($id)
    {

        $post = $this->post->findOrFail($id);
        $post->delete();
        return redirect()->route(('admin.posts.index'));
    }

    public function index_unconf()
    {
        $role = Auth::user()->getRoleNames()->first();
        if($role == 'admin'){
             $posts=$this->post->where('is_actived','0')->get();
        }

        elseif($role == 'farmer') {
            $posts = $this->post->where('is_actived','0')->get();
        }
        return view('admin.posts.unconfirmed', compact('posts'));
    }
    public function accept(Request $request, $id)
    {
        $post = $this->post->findOrFail($id);
        $data['is_actived'] = 1;
        $data['staff_id'] = auth::user()->id;
        $post->update($data);
        return redirect()->route(('admin.posts.unconfirmed'));
    }
}
