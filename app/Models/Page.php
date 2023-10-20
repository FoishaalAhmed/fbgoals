<?php

namespace App\Models;

use Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'position', 'status', 
    ];

    public function storePage(object $request)
    {
        $this->title = $request->title ;
        $this->slug = Str::slug($request->title) ;
        $this->content = $request->content ;
        $this->position = $request->position ;
        $storePage = $this->save();

        $storePage
            ? session()->flash('success', 'New Page Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updatePage(object $request, object $page)
    {
        $page->title = $request->title ;
        $page->slug = Str::slug($request->title) ;
        $page->content = $request->content ;
        $page->position = $request->position ;
        $page->status = $request->status ;
        $updatePage = $page->save();

        $updatePage
            ? session()->flash('success', 'Page Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyPage(object $page)
    {
        $destroyPage = $page->delete();

        $destroyPage
            ? session()->flash('success', 'Page Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
    
}
