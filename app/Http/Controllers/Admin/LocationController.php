<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Region, Province, District, Ward};

class LocationController extends Controller
{
    public function index()
    {
        $data['regions'] = Region::get(["name", "id"]);
        return view('admin.locations.location', $data);
    }
    public function getProvince(Request $request)
    {
        $data['provinces'] = Province::where("region_id", $request->region_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
    public function getDistrict(Request $request)
    {
        $data['districts'] = District::where("province_id", $request->province_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
    public function getWard(Request $request)
    {
        $data['wards'] = Ward::where("district_id", $request->district_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}