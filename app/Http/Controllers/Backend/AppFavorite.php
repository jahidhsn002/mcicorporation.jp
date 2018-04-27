<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\Vehicle;
use App\Feature;

class AppFavorite extends Controller
{


    public function index(Request $request)
    {
        $vehicles = $request->user()->vehicles;
        $sidebar = Sidebar::all();

        return view('backend.favorite', [
            'vehicles' => $vehicles,
            'sidebar' => $sidebar
        ]);
    }

    public function save(Request $request, $vehicle_id = null)
    {

        // Save Vehicle
        $exists = $request->user()->vehicles()->where('vehicle_id', $vehicle_id)->exists();
        if($exists) $request->user()->vehicles()->detach($vehicle_id);
        else $request->user()->vehicles()->attach($vehicle_id);

        return back();
    }
    
}
