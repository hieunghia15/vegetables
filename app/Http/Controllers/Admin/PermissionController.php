<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permissionModel)
    {
        $this->permissions = $permissionModel;
    }
    public function index()
    {
        $all_permissions_in_database = $this->permissions::all();
        return view('admin.permissions.index', compact('all_permissions_in_database'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create-permission');
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
            'name' => ['required', 'string', 'max:255']
        ]);
        $permissions = Permission::create($validated_data);
        return redirect()->route(('admin.permissions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = $this->permissions->findOrFail($id);
        return view('admin.permissions.edit-permission', compact('permissions'));
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
            'name' => ['required', 'string', 'max:255']
        ]);
        $permissions = $this->permissions->findOrFail($id);
        $permissions->update($validated_data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = $this->permissions->findOrFail($id);
        return view('admin.permissions.delete-permission', compact('permissions'));
    }
    public function delete($id)
    {
        $permissions = $this->permissions->findOrFail($id);
        $permissions->delete();
        return redirect()->route(('admin.permissions.index'));
    }
}