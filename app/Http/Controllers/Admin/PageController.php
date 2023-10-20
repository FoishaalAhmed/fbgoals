<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $pageObject;

    public function __construct()
    {
        $this->pageObject = new Page();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::oldest('title')->get();
        return view('backend.admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $this->pageObject->storePage($request);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('backend.admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $this->pageObject->updatePage($request, $page);
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $this->pageObject->destroyPage($page);
        return back();
    }
}
