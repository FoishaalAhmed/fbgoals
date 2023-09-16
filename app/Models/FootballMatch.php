<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootballMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'matches', 'details'
    ];

    public static $validateRule = [
        'matches' => ['required', 'string'],
        'links.*' => ['nullable', 'string', 'max:555'],
        'details' => ['nullable', 'string']
    ];

    public function links()
    {
        return $this->hasMany(MatchLink::class);
    }

    public function storeMatch(Object $request)
    {
        $date = date('Y-m-d', strtotime('- 2 days'));
        $this->whereDate('created_at', '<=', $date)->delete();

        $this->matches = $request->matches;
        $this->details = $request->details;
        $storeMatch    = $this->save();

        if (!empty($request->links[0]) || !is_null($request->links[0])) {
            foreach ($request->links as $value) {
                $links[] = [
                    'football_match_id' => $this->id,
                    'link' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
            MatchLink::insert($links);
        }

        $storeMatch
            ? session()->flash('success', 'Match Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateMatch(Object $request, Object $match)
    {
        $match->matches = $request->matches;
        $match->details = $request->details;
        $updateMatch    = $match->save();

        if (!empty($request->links[0]) || !is_null($request->links[0])) {
            MatchLink::where('football_match_id', $match->id)->delete();
            foreach ($request->links as $value) {
                $links[] = [
                    'football_match_id' => $match->id,
                    'link' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
            MatchLink::insert($links);
        }

        $updateMatch
            ? session()->flash('success', 'Match Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyMatch(Object $match)
    {
        MatchLink::where('football_match_id', $match->id)->delete();
        $destroyMatch = $match->delete();
        $destroyMatch
            ? session()->flash('success', 'Match Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
