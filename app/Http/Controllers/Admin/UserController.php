<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    protected $userObject;

    public function __construct()
    {
        $this->userObject = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::oldest('name')->get();
        return view('backend.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::oldest('name')->get(['id', 'name']);
        return view('backend.admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->userObject->storeUser($request);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $permissions = Permission::oldest('name')->get(['id', 'name']);
        $permissionArray = DB::table('model_has_permissions')->where('model_id', $user->id)->pluck('permission_id')->toArray();
        return view('backend.admin.users.edit', compact('permissions', 'user', 'permissionArray'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userObject->updateUser($request, $user);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userObject->destroyUser($user);
        return back();
    }
}
