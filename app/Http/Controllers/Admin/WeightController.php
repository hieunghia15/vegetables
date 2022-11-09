<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    private $weights;

    public function __construct(Weight $weightModel)
    {
        $this->weights = $weightModel;
    }

    public function index()
    {
        $weights = $this->weights->all();
        
        return view('admin.product-properties.weights.index', compact('weights'));
    }

    public function create(){
        return view('admin.product-properties.weights.index');
    }
    public function store(Request $request){

       
        $validate_data= $request->validate([
            'weight'=> 'required',
            
        ]);
        
        $this->weights->create($validate_data);
        return redirect()->route(('admin.weights.index'));
        
    }

    public function edit($id){
        $weight = $this->weights->findOrFail($id);
        
        return view('admin.product-properties.weights.edit-weight', compact('weight'));
    }

    public function update(Request $request, $id){

        $validate_data= $request->validate([
            'weight'=> 'required',
              
        ]);
        $weight = $this->weights->findOrFail($id);
        $weight->update($validate_data);

        return redirect()->route(('admin.weights.index'));
    }

    public function destroy($id){
        $weight = $this->weights->findOrFail($id);
        return view('admin.product-properties.weights.delete-weight', compact('weight'));
    }

    public function delete(Request $request, $id){
        $weight = $this->weights->findOrFail($id);
        $weight->delete();

        return redirect()->route(('admin.weights.index'));
    }

}
