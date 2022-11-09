<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ward;
use App\Models\Region;
use App\Models\Farmer;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(User $userModel, Ward $wardModel)
    {
        $this->users = $userModel;
        $this->wards = $wardModel;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['regions'] = Region::get(["name", "id"]);
        return view('admin.profile.index', $data);
    }
    public function edit($id)
    {
        $admin = Auth::user();
        return view('admin.profile.index', compact('admin'));
    }
    public function editProfileUser($id)
    {
        $user = $this->users->findOrFail($id);
        if ($user -> ward_id != null)
        {
        $region_user_id = $user->ward->district->province->region->id;
        $region_user = Region::where('id', '<>', $region_user_id)->get();
        }else
        $region_user = Region::all();

        return view('customer.user.edit', compact('user', 'region_user'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:now'],
            'gender' => ['nullable', 'string'],
            'bank_account' => ['nullable', 'string', 'numeric'],
            'ward_id' => ['nullable', 'string'],

        ]);
        $user = $this->users->findOrFail($id);
        $user->update($validated_data);

        //Upload image
        $get_image = $request->avatar;
        if ($get_image) {
            $path = 'image/farmer/' . $user->avatar;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'image/farmer/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->avatar = $path . $new_image;
        }
        $user->save();
        return redirect()->back()->with('status', 'Cập nhật thành công');
    }
    public function updateProfile(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:now'],
            'gender' => ['nullable', 'string'],
            'bank_account' => ['nullable', 'string'],
            'ward_id' => ['nullable', 'string'],

        ]);
        $user = $this->users->findOrFail($id);
        $user->update($validated_data);

        //Upload image
        $get_image = $request->avatar;
        if ($get_image) {
            $path = 'image/user/' . $user->avatar;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'image/user/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->avatar = $path . $new_image;
        }
        $user->save();
        return redirect()->route('customer.user.profile');
    }
    public function registerSeller(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['required'],
            'tax_code' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],

        ]);

        Auth()->user()->update(['authentication' => 'Đăng ký']);
        $farmer = Farmer::create($validated_data);

        //Upload image
        $get_image = $request->avatar;
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'image/farmer/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $farmer->avatar = $path . $new_image;

        $farmer->save();
        return redirect()->route('guest.index');
    }
}