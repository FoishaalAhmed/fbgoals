<?php

namespace App\Http\Controllers;

use App\Models\UpcomingMatch;
use Illuminate\Http\Request;

class UpcomingMatchController extends Controller
{
    protected $upcomingMatchObject;

    public function __construct()
    {
        $this->upcomingMatchObject = new UpcomingMatch();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match = $this->upcomingMatchObject->firstOrFail();
        return view('back.admin.match', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpcomingMatch  $upcomingMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matchId)
    {
        $match = $this->upcomingMatchObject->findOrFail($matchId);
        $request->validate($this->upcomingMatchObject::$validateRule);
        $this->upcomingMatchObject->updateUpcomingMatch($request, $match);
        return back();
    }
}
