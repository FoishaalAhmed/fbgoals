<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $newsObject;

    public function __construct()
    {
        $this->newsObject = new News();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest('date')->get();
        return view('backend.admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $this->newsObject->storeNews($request);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('backend.admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        $this->newsObject->updateNews($request, $news);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->newsObject->destroyNews($news);
        return back();
    }
}
