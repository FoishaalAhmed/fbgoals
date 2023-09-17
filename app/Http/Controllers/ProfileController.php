<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    private $userObject;

    public function __construct()
    {
        $this->userObject = new User();
    }

    public function photo(Request $request)
    {
        $request->validate(User::$validatePhotoRule);
        $this->userObject->updateUserPhoto($request);
        return back();
    }

    public function password(Request $request)
    {
        $request->validate(User::$validatePasswordRule);
        $this->userObject->updateUserPassword($request);
        return back();
    }

    public function info(ProfileRequest $request)
    {
        $this->userObject->updateUserInfo($request);
        return back();
    }
}
