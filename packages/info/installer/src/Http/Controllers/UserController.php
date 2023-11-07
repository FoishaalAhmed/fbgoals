<?php

namespace Info\Installer\Http\Controllers;

use Validator;
use AppController;
use Illuminate\Http\Request;

class UserController extends AppController
{
    /**
     * Show form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    	$data['fields'] = config('installer.fields');
        return view('vendor.installer.register', $data);
    }

    /**
     * Manage form submission.
     *
     * @param    Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request)
    {
        $permissions = \Spatie\Permission\Models\Permission::oldest('name')->pluck('name')->toArray();

        $request->merge([
            'password_confirmation' => $request->password,
            'address' => 'address',
            'phone' => '01700000000',
            'phone' => '01700000000',
            'permission' => $permissions
        ]);

        // Form validation with form request or validator method
        $validator = config('installer.validator');

        if ($validator !== null) {
            app($validator);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        }

        (new \App\Models\User())->storeUser($request);
        return redirect()->route('installers.finish');
    }

}
