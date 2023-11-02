<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        app()->setLocale($request->lang);
        session()->put('locale', $request->lang);
        Setting::where(['name' => 'default_language', 'type' => 'General'])->update(['value' => $request->lang]);
        return back();
    }
}
