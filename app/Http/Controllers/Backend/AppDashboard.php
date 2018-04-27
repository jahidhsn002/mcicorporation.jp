<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\Vehicle;

class AppDashboard extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::whereHas('taxonomies', function ($query) {
                                    $query->where('slug', 'new-arrivals');
                                })
                                ->limit(12)
                                ->get();
        $sidebar = Sidebar::all();
        return view('backend.dashboard', [
            'vehicles' => $vehicles,
            'sidebar' => $sidebar
        ]);
    }
}
