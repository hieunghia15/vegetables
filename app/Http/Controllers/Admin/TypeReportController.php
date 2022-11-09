<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeReport;

class TypeReportController extends Controller
{
    private $type_reports;

    public function __construct(TypeReport $type_reportModel)
    {
        $this->type_reports = $type_reportModel;
    }

    public function index()
    {
        $type_reports = $this->type_reports->all();
        
        return view('admin.type-reports.index', compact('type_reports'));
    }

    public function create(){
        return view('admin.type-reports.index');
    }
    public function store(Request $request){

       
        $validate_data= $request->validate([
            'name'=> 'required',
            
        ]);
        
        $this->type_reports->create($validate_data);

        return redirect()->route(('admin.type-reports.index'));
        
    }

    public function edit($id){
        $type_report = $this->type_reports->findOrFail($id);
        
        return view('admin.type-reports.edit-type-report', compact('type_report'));
    }

    public function update(Request $request, $id){

     
        $validate_data= $request->validate([
            'name'=> 'required',
              
        ]);
        $type_report = $this->type_reports->findOrFail($id);
        $type_report->update($validate_data);

        return redirect()->route(('admin.type-reports.index'));
    }

    public function destroy($id){
        $type_report = $this->type_reports->findOrFail($id);
        return view('admin.type-reports.delete-type-report', compact('type_report'));
    }

    public function delete(Request $request, $id){
        $type_report = $this->type_reports->findOrFail($id);
        $type_report->delete();

        return redirect()->route(('admin.type-reports.index'));
    }
}
