<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'teams'
    ];

    public static $validateRule = [
        'teams' => ['required', 'string']
    ];

    public function updateTeam(Object $request, Object $team)
    {
        $team->teams = $request->teams;
        $updateTeam  = $team->save();

        $updateTeam
            ? session()->flash('success', __('Teams Updated Successfully!'))
            : session()->flash('error', __('Something Went Wrong!'));
    }
}
