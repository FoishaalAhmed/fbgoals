<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'twitter',
        'linkedin',
        'pinterest',
        'youtube',
        'instagram',
    ];

    public function createOrUpdateSocials(object $request)
    {
        $socials = $this::updateOrCreate(
            ['id' => 1],
            [
                'facebook'  => $request->facebook,
                'twitter'   => $request->twitter,
                'linkedin'  => $request->linkedin,
                'pinterest' => $request->pinterest,
                'youtube'   => $request->youtube,
                'instagram' => $request->instagram,
            ]
        );

        $socials
            ? session()->flash('success', 'Social Links Saved Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
