<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'ip', 'page_view', 'visit'
    ];

    public function storeVisitor()
    {
        $visitor = $this::where(['date' => date('Y-m-d'), 'ip' => request()->ip()])->first();

        if ($visitor) {
            $visitor->page_view = $visitor->page_view + 1;
            $visitor->save();
        } else {
            $this->date      = date('Y-m-d');
            $this->ip        = request()->ip();
            $this->page_view = 1;
            $this->visit     = 1;
            $this->save();
        }
    }
}
