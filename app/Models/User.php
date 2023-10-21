<?php

namespace App\Models;

use DB;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'address',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static $validatePhotoRule = [
        'photo' => 'mimes:jpeg,jpg,png,gif,webp|required|max:1000',
    ];

    public static $validatePasswordRule = [
        'old_password' => 'required|string',
        'password'    => 'required|string|min:8|confirmed',
    ];

    public function updateUserPhoto($request)
    {
        $user  = $this::findOrFail(auth()->id());
        if (file_exists($user->photo)) unlink($user->photo);
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->extension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/users/';
        $image_url       = $upload_path . $image_full_name;
        $image->move($upload_path, $image_full_name);
        $user->photo     = $image_url;
        $userUpdate      = $user->save();

        $userUpdate
            ? session()->flash('success', __('User Photo Updated Successfully!'))
            : session()->flash('error', __('Something Went Wrong!'));
    }

    public function updateUserPassword($request)
    {
        $user = $this::findOrFail(auth()->id());

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            session()->flash('success', __('User Password Updated Successfully!'));
        } else {
            session()->flash('error', __('Old Password Did Not Matched!'));
        }
    }

    public function updateUserInfo($request)
    {
        $user          = $this::findOrFail(auth()->id());
        $user->name    = $request->name;
        $user->address = $request->address;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $userUpdate    = $user->save();

        $userUpdate
            ? session()->flash('success', __('User Info Updated Successfully!'))
            : session()->flash('error', __('Something Went Wrong!'));
    }

    public function storeUser(object $request)
    {
        try {
            DB::transaction(function() use($request) {

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'password' => Hash::make($request->password),
                ]);

                $role = Role::whereName('Admin')->first();
                $user->assignRole($role);

                $permissionArray = [];

                foreach ($request->permission as $key => $permission) {
                    $permissionArray[] = [$permission];
                }

                $user->givePermissionTo($permissionArray);
                session()->flash('success', __('User Created Successfully!'));

            });
        } catch (\Exception $exception) {
            session()->flash('success', $exception->getMessage());
        }
    }

    public function updateUser(object $request, object $user)
    {
        try {
            DB::transaction(function() use($request, $user) {

                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->save();

                $permissionArray = [];

                foreach ($request->permission as $key => $permission) {
                    $permissionArray[] = [$permission];
                }

                $user->syncPermissions($permissionArray);
                session()->flash('success', __('User Updated Successfully!'));

            });
        } catch (\Exception $exception) {
            session()->flash('success', $exception->getMessage());
        }
    }

    public function destroyUser(object $user)
    {
        try {
            DB::transaction(function() use($user) {

                if (file_exists($user->photo)) unlink($user->photo);
                $user->delete();
                session()->flash('success', __('User Deleted Successfully!'));

            });
        } catch (\Exception $exception) {
            session()->flash('success', $exception->getMessage());
        }
    }


}
