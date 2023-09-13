<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'leagues'
    ];

    public static $validateRule = [
        'leagues' => ['required', 'string']
    ];

    public function updateLeague(Object $request, Object $league)
    {
        $league->leagues = $request->leagues;
        $updateLeague    = $league->save();

        $updateLeague
            ? session()->flash('success', 'Leagues Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
