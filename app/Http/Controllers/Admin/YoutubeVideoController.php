<?php

namespace App\Http\Controllers\Admin;

use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YoutubeVideoController extends Controller
{
    protected $videoObject;

    public function __construct()
    {
        $this->videoObject = new YoutubeVideo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = YoutubeVideo::latest('date')->get();
        return view('backend.admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->videoObject::$validateRule);
        $this->videoObject->storeVideo($request);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YoutubeVideo  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(YoutubeVideo $video)
    {
        return view('backend.admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YoutubeVideo  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YoutubeVideo $video)
    {
        $request->validate($this->videoObject::$validateRule);
        $this->videoObject->updateVideo($request, $video);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YoutubeVideo  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(YoutubeVideo $video)
    {
        $this->videoObject->destroyVideo($video);
        return back();
    }
}
