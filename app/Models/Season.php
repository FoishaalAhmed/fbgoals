<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'season'
    ];

    public static $validateRule = [
        'season' => ['required', 'digits:4', 'integer', 'min:1970']
    ];

    public function updateSeason(Object $request, Object $season)
    {
        $season->season = $request->season;
        $updateSeason   = $season->save();

        $updateSeason
            ? session()->flash('success', __('Season Updated Successfully!'))
            : session()->flash('error', __('Something Went Wrong!'));
    }
}
