<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private $categories;
    public function  __construct(Category $categoryModel, Post $postModel, User $userModel)
    {
        $this->category = $categoryModel;
        $this->post = $postModel;
        $this->user = $userModel;
    }

    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        if($role == 'admin'){
             $categories=$this->category->where('farmer_id', null)->get();
        }

        elseif($role == 'farmer') {
            $farmer_id = Auth::user()->farmer->id;
            $categories = $this->category->where('farmer_id',$farmer_id)->get();
        }

        return view('admin.posts.categories.index', compact('categories'));
    }

    public function create(){

        return view('admin.posts.categories.store');
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate(
            [

                'name' => 'required',
                'thumbnail' => 'required|image',
                'category_slug' => 'required',
                'is_actived' => 'nullable',

            ]
        );
        $get_image = $request->file('thumbnail');
        $path = 'image/post/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $link = $get_image->move($path, $new_image);
        $validate_data['thumbnail'] = $link;

        $role = Auth::user()->getRoleNames()->first();
        if($role == 'admin'){
             $validate_data['farmer_id'] = Null;
        }

        elseif($role == 'farmer') {
            $farmer_id = Auth::user()->farmer->id;
            $validate_data['farmer_id'] = $farmer_id;
        }

        $this->category->create($validate_data);
        return redirect()->route('admin.posts.categories');
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('admin.posts.categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $validate_data = $request->validate([
            'name' => 'nullable',
            'category_slug' => 'required',
            'thumbnail',
            'is_actived' => 'nullable'
        ]);
        $category = $this->category->findOrFail($id);
        $old_thumbnail = $category->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $get_image = $request->file('thumbnail');
            $path = 'image/post/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $link = $get_image->move($path, $new_image);
            $validate_data['thumbnail'] = $link;
        }
        $validate_data['user_id'] = auth::user()->id;
        $category->update($validate_data);
        return redirect()->route(('admin.posts.categories'));
    }
    public function delete($id)
    {

        $category = $this->category->findOrFail($id);
        $category->delete();
        return redirect()->route('admin.posts.categories');
    }
}
