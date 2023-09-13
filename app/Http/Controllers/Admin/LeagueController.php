<?php

namespace App\Http\Controllers\Admin;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeagueController extends Controller
{
    protected $leagueObject;

    public function __construct()
    {
        $this->leagueObject = new League();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $league = League::firstOrFail();
        return view('backend.admin.league', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, League $league)
    {
        $request->validate(League::$validateRule);
        $this->leagueObject->updateLeague($request, $league);
        return back();
    }
}
