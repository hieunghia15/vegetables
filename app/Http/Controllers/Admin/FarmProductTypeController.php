<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmProductType;
use Illuminate\Support\Facades\Storage;
use File;

class FarmProductTypeController extends Controller
{
    private $farm_product_types;

    public function __construct(FarmProductType $farm_product_typeModel)
    {
        $this->farm_product_types = $farm_product_typeModel;
    }

    public function index()
    {
        $farm_product_types = $this->farm_product_types->all();

        return view('admin.farm-categories.index', compact('farm_product_types'));
    }


    public function create()
    {

        return view('admin.farm-categories.index');
    }
    public function store(Request $request)
    {


        $validate_data = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required',
            'product_type_slug' => 'required',

        ]);
        $data = $request->all();
        $farm_product = new FarmProductType();
        $farm_product->name = $data['name'];
        $farm_product->product_type_slug = $data['product_type_slug'];

        $get_image = $request->thumbnail;
        $path = 'public/upload/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $farm_product->thumbnail = $path . $new_image;
        $farm_product->save();

        return redirect()->route(('admin.farm-product-types.index'));
    }

    public function edit($id)
    {
        $farm_product_type = $this->farm_product_types->findOrFail($id);
        return view('admin.farm-categories.edit-category', compact('farm_product_type'));
    }

    public function update(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'product_type_slug' => 'required',
        ]);

        $farm_product_type = $this->farm_product_types->findOrFail($id);
        $farm_product_type->update($validate_data);

        //Upload image
        $get_image = $request->thumbnail;
        if ($get_image) {
            $path = 'public/upload/' . $farm_product_type->thumbnail;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'public/upload/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $farm_product_type->thumbnail = $path . $new_image;
        }
        $farm_product_type->save();

        return redirect()->route('admin.farm-product-types.index')->with('status', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $farm_product_type = $this->farm_product_types->findOrFail($id);
        return view('admin.farm-categories.delete-category', compact('farm_product_type'));
    }

    public function delete(Request $request, $id)
    {
        $farm_product_type = $this->farm_product_types->findOrFail($id);
        $path = $farm_product_type->thumbnail;
        if (File::exists($path)) {
            File::delete($path);
        }
        $farm_product_type->delete();
        return redirect()->route(('admin.farm-product-types.index'));
    }
}