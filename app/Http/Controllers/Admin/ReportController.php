<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\TypeReport;
use App\Models\User;
use App\Models\Farmer;
use Illuminate\Support\Facades\Auth;



class ReportController extends Controller
{

    public function __construct(Report $reportModel, TypeReport $type_reportModel, User $userModel, Farmer $farmerModel)
    {
        $this->users = $userModel;
        $this->reports = $reportModel;
        $this->type_reports = $type_reportModel;
        $this->farmers = $farmerModel;
    }

    public function index()
    {
        $reports = $this->reports->where('processing', 0)->get();


        return view('admin.ad-report.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.ad-report.index');
    }
    public function store(Request $request)
    {


        $validate_data = $request->validate([
            'messege' => 'required',
            'processing',
            'user_id',
            'farmer_id' => 'required',
            'type_report_id' => 'reqired'

        ]);

        $this->reports->create($validate_data);

        return redirect()->route(('admin.ad-report.index'));
    }

    public function edit($id)
    {
        $report = $this->reports->findOrFail($id);

        return view('admin.ad-report.edit-report', compact('report'));
    }

    public function update(Request $request, $id)
    {


        $validate_data = $request->validate([
            'messege' => 'required',
            'processing',
            'user_id',
            'farmer_id' => 'required',
            'type_report_id' => 'reqired'

        ]);
        $report = $this->reports->findOrFail($id);
        $report->update($validate_data);

        return redirect()->route(('admin.ad-report.index'));
    }

    public function destroy($id)
    {
        $report = $this->reports->findOrFail($id);
        return view('admin.ad-report.delete-report', compact('report'));
    }

    public function delete(Request $request, $id)
    {
        $report = $this->reports->findOrFail($id);
        $report->delete();

        return redirect()->route(('admin.ad-report.index'));
    }

    public function editReport($id)
    {
        $report = $this->reports->findOrFail($id);

        return view('admin.ad-report.edit-report', compact('report'));
    }

    public function updateReport(Request $request, $id)
    {


        $validate_data = $request->validate([
            'processing' => 'required',
        ]);
        $report = $this->reports->findOrFail($id);
        $report->update($validate_data);

        return redirect()->route(('admin.ad-report.index'));
    }


    public function createCusReport($id)
    {
        $farmer = $this->farmers->where('id', $id)->first();
        $farmer_id = $farmer->id;
        $type_reports = $this->type_reports->all();
        return view('customer.cus-report.index', compact('type_reports', 'farmer', 'farmer_id'));
    }
    public function storeCusReport(Request $request)
    {
        $validate_data = $request->validate([
            'messege' => 'required',
            'user_id',
            'farmer_id' => 'required',
            'type_report_id' => 'required'

        ]);
        $validate_data['processing'] = 0;
        $validate_data['user_id'] = auth::user()->id;
        $this->reports->create($validate_data);
        return redirect()->route(('guest.index'));
    }
}