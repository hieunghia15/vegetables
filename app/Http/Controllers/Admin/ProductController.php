<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Farmer;
use App\Models\FarmProductType;
use App\Models\Express;
use App\Models\Scale;
use App\Models\Unit;
use App\Models\Picture;
use Auth;
use DB;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        Product $productModel,
        Scale $scaleModel,
        User $userModel,
        FarmProductType $farmProductTypeModel,
        Express $expressModel,
        Unit $unitModel,
        Picture $pictureModel
    ) {
        $this->products = $productModel;
        $this->users = $userModel;
        $this->farm_product_types = $farmProductTypeModel;
        $this->expresses = $expressModel;
        $this->scales = $scaleModel;
        $this->units = $unitModel;
        $this->pictures = $pictureModel;
    }

    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $product = $this->products->paginate(20);
        } elseif ($role == 'farmer') {
            $user = Auth::user()->farmer->id;
            $product = $this->products
                ->where('farmer_id', '=', $user)
                ->paginate(20);
        }
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $express = $this->expresses->all();
        $scale = $this->scales->all();
        $unit = $this->units->all();
        $farm_product_type = $this->farm_product_types->all();
        $user = Auth::user()->farmer->id;
        return view('admin.products.add', compact('express', 'scale', 'unit', 'farm_product_type', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => 'required',
            'price' => ['required'],
            'description' => ['nullable'],
            'inventory' => ['required'],
            'pack' => ['required'],
            'product_slug' => ['required'],
            'is_actived' => ['required', 'string'],
            'planting_methods' => ['required'],
            'farm_product_type_id' => ['required', 'string'],
            'express_id' => ['required', 'string'],
            'scale_id' => ['required', 'string'],
            'unit_id' => ['required', 'string'],
            'weight' => ['required'],
            'farmer_id' => ['required', 'string'],
            'url' => 'required'
        ]);
        $validated_data['product_slug'] = $request['product_slug'] . rand(0, 99);
        $product = $this->products->create($validated_data);

        //Upload thumbnail
        $get_image = $request->thumbnail;
        if ($get_image) {
            $path = 'image/product/' . $product->thumbnail;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'image/product/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->thumbnail = $path . $new_image;
        }
        $product->save();

        $product_id = $product->id;
        foreach ($request->url as $urls) {
            $picture = $this->pictures->create([
                'url' => $urls,
                'product_id' => $product_id
            ]);
            //Upload url
            $get_image = $urls;
            if ($get_image) {
                $path = 'image/library/' . $picture->url;
                if (file_exists($path)) {
                    @unlink($path);
                }
                $get_name_image = $get_image->getClientOriginalName();
                $path = 'image/library/';
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $picture->url = $path . $new_image;
            }
            $picture->save();
        }

        return redirect()->route('admin.products.index')->with('status', 'Thêm nông sản thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_slug)
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {

            $product = Product::where('product_slug', $product_slug)->first();
            $picture = $product->pictures->all();
            $farmer_id = $product->farmer_id;
            $shop = Farmer::where('id', '=', $farmer_id)->first()->name;
        } elseif ($role == 'farmer') {

            $user = Auth::user()->farmer->id;
            $product = Product::where('product_slug', $product_slug)
                ->where('farmer_id', '=', $user)->first();
            $picture =  $product->pictures->all();
            $farmer_id = $product->farmer_id;
            $shop = Farmer::where('id', '=', $farmer_id)->first()->name;
        }

        return view('admin.products.show', compact('product', 'picture', 'shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->products->findOrFail($id);
        $user = Auth::user()->farmer->id;
        $express = $this->expresses
            ->with('products')
            ->where('id', '<>', $product->express_id)->get();
        $scale = $this->scales
            ->with('products')
            ->where('id', '<>', $product->scale_id)->get();
        $unit = $this->units
            ->with('products')
            ->where('id', '<>', $product->unit_id)->get();;
        $farm_product_type = $this->farm_product_types
            ->with('products')
            ->where('id', '<>', $product->farm_product_type_id)->get();;
        return view('admin.products.edit', compact('product', 'user', 'express', 'scale', 'unit', 'farm_product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail',
            'price' => ['required'],
            'description' => ['nullable'],
            'inventory' => ['required'],
            'pack' => ['required'],
            'product_slug' => ['required'],
            'is_actived' => ['required', 'string'],
            'planting_methods' => ['required'],
            'farm_product_type_id' => ['required', 'string'],
            'express_id' => ['required', 'string'],
            'scale_id' => ['required', 'string'],
            'unit_id' => ['required', 'string'],
            'weight' => ['required'],
            'farmer_id' => ['required', 'string'],
            'url'
        ]);

        $product = $this->products->findOrFail($id);
        $product->update($validated_data);

        //Upload image
        $get_image = $request->thumbnail;
        if ($get_image) {
            $path = 'image/library/' . $product->thumbnail;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'image/library/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->thumbnail = $path . $new_image;
        }
        $product->save();

        $product_id = $product->id;
        if ($request->hasFile('url')) {
            foreach ($request->url as $urls) {
                $picture = $this->pictures->create([
                    'url' => $urls,
                    'product_id' => $product_id
                ]);
                //Upload url
                $get_image = $urls;
                if ($get_image) {
                    $path = 'image/library/' . $picture->url;
                    if (file_exists($path)) {
                        @unlink($path);
                    }
                    $get_name_image = $get_image->getClientOriginalName();
                    $path = 'image/library/';
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $picture->url = $path . $new_image;
                }
                $picture->update();
            }
        }

        return redirect()->route('admin.products.index')->with('status', 'Cập nhật nông sản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->products->findOrFail($id);
        return view('admin.products.delete', compact('product'));
    }
    public function delete(Request $request, $id)
    {
        $product = $this->products->findOrFail($id);
        $path = $product->thumbnail;
        $pictures = $product->pictures->all();

        if (File::exists($path)) {
            File::delete($path);
        }

        foreach ($pictures as $picture) {
            $urls = $picture->url;
            if (File::exists($urls)) {
                File::delete($urls);
            }
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('status', 'Xóa nông sản thành công');
    }
}