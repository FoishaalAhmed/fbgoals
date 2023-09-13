<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturedMatch extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'match_id'];

    public static $validateRule = [
        'title'    => ['string', 'max:191', 'required'],
        'match_id' => ['string', 'max:11', 'required'],
    ];

    public function updateFeaturedMatch($request, $match)
    {
        $match->title        = $request->title;
        $match->match_id     = $request->match_id;
        $updateFeaturedMatch = $match->save();

        $updateFeaturedMatch
            ? session()->flash('success', 'Match Info Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
