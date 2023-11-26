<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    protected $adObject;

    public function __construct()
    {
        $this->adObject = new Ad();
    }

    public function index()
    {
        $ads = Ad::oldest('position')->get();
        return view('backend.admin.ads.index', compact('ads'));
    }

    public function edit(Ad $ad)
    {
        return view('backend.admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate($this->adObject::$validateRule);
        $this->adObject->updateAd($request, $ad);
        return redirect()->route('admin.ads.index');
    }
}
