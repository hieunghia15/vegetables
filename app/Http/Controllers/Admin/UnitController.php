<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    private $units;

    public function __construct(Unit $unitModel)
    {
        $this->units = $unitModel;
    }

    public function index()
    {
        $units = $this->units->all();
        
        return view('admin.product-properties.units.index', compact('units'));
    }

    public function create(){
        return view('admin.product-properties.units.index');
    }
    public function store(Request $request){

       
        $validate_data= $request->validate([
            'name'=> 'required',
            
        ]);
        
        $this->units->create($validate_data);

        return redirect()->route(('admin.units.index'));
        
    }

    public function edit($id){
        $unit = $this->units->findOrFail($id);
        
        return view('admin.product-properties.units.edit-unit', compact('unit'));
    }

    public function update(Request $request, $id){

     
        $validate_data= $request->validate([
            'name'=> 'required',
              
        ]);
        $unit = $this->units->findOrFail($id);
        $unit->update($validate_data);

        return redirect()->route(('admin.units.index'));
    }

    public function destroy($id){
        $unit = $this->units->findOrFail($id);
        return view('admin.product-properties.units.delete-unit', compact('unit'));
    }

    public function delete(Request $request, $id){
        $unit = $this->units->findOrFail($id);
        $unit->delete();

        return redirect()->route(('admin.units.index'));
    }
}
