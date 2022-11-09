<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Express;

class ExpressController extends Controller
{
    private $expresses;

    public function __construct(Express $expressModel)
    {
        $this->expresses = $expressModel;
    }

    public function index()
    {
        $expresses = $this->expresses->all();
        
        return view('admin.expresses.index', compact('expresses'));
    }

    
    public function create(){
        return view('admin.expresses.index');
    }
    public function store(Request $request){

       
        $validate_data= $request->validate([
            'name'=> 'required',
            
        ]);
        
        $this->expresses->create($validate_data);
        
        
        return redirect()->route(('admin.expresses.index'));
        
    }

    public function edit($id){
        $express = $this->expresses->findOrFail($id);
        return view('admin.expresses.edit-express', compact('express'));
    }

    public function update(Request $request, $id){

     
        $validate_data= $request->validate([
            'name'=> 'required',
              
        ]);
        $express = $this->expresses->findOrFail($id);
        
        $express->update($validate_data);
        
        
        return redirect()->route(('admin.expresses.index'));
    }

    public function destroy($id){
        $express = $this->expresses->findOrFail($id);
        return view('admin.expresses.delete-express', compact('express'));
    }

    public function delete(Request $request, $id){
        $express = $this->expresses->findOrFail($id);
        $express->delete();
        
        return redirect()->route(('admin.expresses.index'));
    }
}
