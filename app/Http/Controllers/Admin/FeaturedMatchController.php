<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FeaturedMatch;
use App\Http\Controllers\Controller;

class FeaturedMatchController extends Controller
{
    protected $featuredMatchObject;

    public function __construct()
    {
        $this->featuredMatchObject = new FeaturedMatch();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $match = $this->featuredMatchObject->firstOrFail();
        return view('backend.admin.featured-match', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedMatch  $featuredMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matchId)
    {
        $match = $this->featuredMatchObject->findOrFail($matchId);
        $request->validate($this->featuredMatchObject::$validateRule);
        $this->featuredMatchObject->updateFeaturedMatch($request, $match);
        return back();
    }
}
