<?php

namespace App\Http\Controllers\Admin;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    protected $seasonObject;

    public function __construct()
    {
        $this->seasonObject = new Season();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $season = Season::firstOrFail();
        return view('backend.admin.season', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        $request->validate(Season::$validateRule);
        $this->seasonObject->updateSeason($request, $season);
        return back();
    }
}
