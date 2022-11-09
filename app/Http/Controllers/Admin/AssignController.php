<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Farmer;


class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permissionModel, Role $roleModel, User $userModel, Farmer $farmerModel)
    {
        $this->permissions = $permissionModel;
        $this->roles = $roleModel;
        $this->users = $userModel;
        $this->farmers = $farmerModel;
    }
    public function index()
    {
        $user = User::with('roles', 'permissions')->get();
        return view('admin.users.permission', compact('user'));
    }
    public function rolePermission()
    {
        $role = $this->roles->with('permissions')->get();
        return view('admin.permissions.role-permission', compact('role'));
    }
    public function assignPermission($id)
    {
        $role = $this->roles->findOrFail($id);
        $permission = Permission::all();
        $get_permissions = $role->permissions;
        return view('admin.permissions.assign-permission', compact('permission', 'role', 'get_permissions'));
    }
    public function insertPermission(Request $request, $id)
    {
        $data = $request->all();
        $role = $this->roles->find($id);
        $role->syncPermissions($data['permission']);
        return redirect()->back()->with('status', 'Successfully assigning permission');
    }
    public function assignRole($id)
    {
        $user = User::findOrFail($id);
        $role = Role::all();
        $all_column_roles = $user->roles->first();
        return view('admin.permissions.assign-role', compact('user', 'role', 'all_column_roles'));
    }
    public function insertRole(Request $request, $id)
    {
        $data = $request->all();
        $user = $this->users->findOrFail($id);
        $user->syncRoles($data['role']);
        return redirect()->back()->with('status', 'Successfully assigning role');
    }

    public function indexFarmer()
    {
        $farmer = User::with('farmer')
            ->where('authentication', 'Xác nhận')
            ->paginate(10);
        return view('admin.farmers.index', compact('farmer'));
    }
    public function listFarmerNotAccept()
    {
        $non_farmer = User::with('farmer')
            ->where('authentication', 'Đăng ký')
            ->paginate(10);
        return view('admin.farmers.unconfirmed', compact('non_farmer'));
    }

    public function acceptFarmer(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['user_id']);
        $user->authentication = $data['authentication'];
        $user->syncRoles('farmer');
        $user->save();
    }
}