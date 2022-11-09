<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scale;

class ScaleController extends Controller
{
    private $scales;

    public function __construct(Scale $scaleModel)
    {
        $this->scales = $scaleModel;
    }

    public function index()
    {
        $scales = $this->scales->all();
        
        return view('admin.product-properties.scales.index', compact('scales'));
    }

    
    public function create(){
        return view('admin.product-properties.scales.index');
    }
    public function store(Request $request){

       
        $validate_data= $request->validate([
            'productivity'=> 'required',
            
        ]);
        
        $this->scales->create($validate_data);
        
        
        return redirect()->route(('admin.scales.index'));
        
    }

    public function edit($id){
        $scale = $this->scales->findOrFail($id);
        //$scales = $this->scales->all();
        return view('admin.product-properties.scales.edit-scale', compact('scale'));
    }

    public function update(Request $request, $id){

     
        $validate_data= $request->validate([
            'productivity'=> 'required',
              
        ]);
        $scale = $this->scales->findOrFail($id);
        
        $scale->update($validate_data);
       
        
        return redirect()->route(('admin.scales.index'));
    }

    public function destroy($id){
        $scale = $this->scales->findOrFail($id);
        return view('admin.product-properties.scales.delete-scale', compact('scale'));
    }

    public function delete(Request $request, $id){
        $scale = $this->scales->findOrFail($id);
        $scale->delete();

        
        return redirect()->route(('admin.scales.index'));
    }
}
