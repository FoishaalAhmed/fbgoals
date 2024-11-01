<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'position', 'ad'
    ];

    public static $validateRule = [
        'ad' => ['string', 'required'],
    ];

    public function updateAd(object $request, object $ad)
    {
        $ad->ad = $request->ad;
        $updateAd = $ad->save();

        $updateAd
            ? session()->flash('success', __('Ad Updated Successfully!'))
            : session()->flash('error', __('Something Went Wrong!'));
    }
    
}
