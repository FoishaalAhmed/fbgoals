<?php

namespace App\Models;

use Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'date', 'content', 'tags', 'status', 'photo',
    ];

    public function storeNews(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->extension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/news/';
            $image_url       = $upload_path . $image_full_name;
            $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title   = $request->title;
        $this->slug    = Str::slug($request->title);
        $this->content = $request->content;
        $this->date    = date('Y-m-d', strtotime($request->date));
        $this->tags    = $request->tags != null ? implode(',', array_column(json_decode($request->tags), 'value')) : null;
        $storeNews     = $this->save();

        $storeNews
            ? session()->flash('success', 'News Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateNews(Object $request, Object $news)
    {
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($news->photo)) unlink($news->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->extension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/news/';
            $image_url       = $upload_path . $image_full_name;
            $image->move($upload_path, $image_full_name);
            $news->photo     = $image_url;
        }

        $news->title   = $request->title;
        $news->slug    = Str::slug($request->title);
        $news->date    = date('Y-m-d', strtotime($request->date));
        $news->content = $request->content;
        $news->tags    = $request->tags != null ? implode(',', array_column(json_decode($request->tags), 'value')) : null;
        $updateNews    = $news->save();

        $updateNews
            ? session()->flash('success', 'News Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyNews(Object $news)
    {
        if (file_exists($news->photo)) unlink($news->photo);
        $newsDelete = $news->delete();

        $newsDelete
            ? session()->flash('success', 'News Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
