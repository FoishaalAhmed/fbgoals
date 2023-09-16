<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link'
    ];
}
