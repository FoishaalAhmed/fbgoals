<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    protected $settingObject;

    public function __construct()
    {
        $this->settingObject = new Setting();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('backend.admin.setting');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate($this->settingObject::$validateRule);
        $response = $this->settingObject->storeSetting($request);
        session()->flash($response['alert'], $response['message']);
        return back();
    }
}
