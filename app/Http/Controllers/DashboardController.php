<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = 'Admin';

        switch ($role) {
            case auth()->user()->hasRole('Admin'):
                return redirect()->route('admin.dashboard');
                break;
            default:
                return redirect()->route('user.dashboard');
                break;
        }
    }
}
