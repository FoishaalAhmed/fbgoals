<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $data = [
            'totalVisit'    => Visitor::sum('visit'),
            'totalPageView' => Visitor::sum('page_view'),
            'uniqueVisit'   => Visitor::distinct('ip')->count('ip'),
            'todayVisit'    => Visitor::where('date', $today)->sum('visit'),
            'todayPageView' => Visitor::where('date', $today)->sum('page_view')
        ];
        return view('backend.admin.dashboard', $data);    
    }
}
