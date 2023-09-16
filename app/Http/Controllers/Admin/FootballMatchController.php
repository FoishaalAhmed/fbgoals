<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FootballMatch;
use App\Http\Controllers\Controller;

class FootballMatchController extends Controller
{
    protected $matchObject;

    public function __construct()
    {
        $this->matchObject = new FootballMatch();
    }

    public function index()
    {
        $matches = FootballMatch::with('links')->latest()->get();
        return view('backend.admin.matches.index', compact('matches'));
    }

    public function create()
    {
        return view('backend.admin.matches.create');
    }

    public function store(Request $request)
    {
        $request->validate(FootballMatch::$validateRule);
        $this->matchObject->storeMatch($request);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     * 
     *@param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(FootballMatch  $match)
    {
        $match = $match->load('links');
        return view('backend.admin.matches.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FootballMatch $match)
    {
        $request->validate(FootballMatch::$validateRule);
        $this->matchObject->updateMatch($request, $match);
        return back();
    }

    public function destroy(FootballMatch $match)
    {
        $this->matchObject->destroyMatch($match);
        return back();
    }

    public function delete()
    {
        $matches = request()->matches;
        $massDelete = FootballMatch::whereIn('id', $matches)->delete();
        $massDelete
            ? session()->flash('success', 'Matches Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
