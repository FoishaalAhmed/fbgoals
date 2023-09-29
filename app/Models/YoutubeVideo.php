<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YoutubeVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'date', 'link'
    ];

    public static $validateRule = [
        'title' => ['string', 'required', 'max:190'],
        'link' => ['string', 'required'],
        'date' => ['date', 'required'],
    ];

    public function storeVideo(Object $request)
    {
        $this->title   = $request->title;
        $this->link    = $request->link;
        $this->date    = date('Y-m-d', strtotime($request->date));
        $storeVideo     = $this->save();

        $storeVideo
            ? session()->flash('success', 'Video Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateVideo(Object $request, Object $video)
    {
        $video->title   = $request->title;
        $video->link    = $request->link;
        $video->date    = date('Y-m-d', strtotime($request->date));
        $updateVideo     = $video->save();

        $updateVideo
            ? session()->flash('success', 'Video Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyVideo(Object $video)
    {
        $videoDelete = $video->delete();

        $videoDelete
            ? session()->flash('success', 'Video Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
