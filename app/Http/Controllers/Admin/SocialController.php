<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    protected $socialObject;

    public function __construct()
    {
        $this->socialObject = new Social();
    }

    public function edit()
    {
        $social = Social::first();
        return view('backend.admin.social', compact('social'));
    }

    public function update(Request $request)
    {
        $this->socialObject->createOrUpdateSocials($request);
        return back();
    }
}
