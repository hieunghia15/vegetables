<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $roleModel)
    {
        $this->roles = $roleModel;
    }
    public function index()
    {
        $all_roles_in_database = $this->roles::all();
        return view('admin.permissions.role', compact('all_roles_in_database'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create-role');
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
        $roles = Role::create($validated_data);
        return redirect()->back();
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
        $roles = $this->roles->findOrFail($id);
        return view('admin.permissions.edit-role', compact('roles'));
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
        $roles = $this->roles->findOrFail($id);
        $roles->update($validated_data);
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
        $roles = $this->roles->findOrFail($id);
        return view('admin.permissions.delete-role', compact('roles'));
    }
    public function delete($id)
    {
        $roles = $this->roles->findOrFail($id);
        $roles->delete();
        return redirect()->route(('admin.permissions.role'));
    }
}