<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\Vehicle;
use App\Feature;

class AppVehicle extends Controller
{


    public function index($id = null)
    {
        $vehicle = Vehicle::find($id);


        $sidebar = Sidebar::all();
        $feature = Feature::all();
        $feature_selected = [];
        $taxonomy_meta_selected = [];
        if ($vehicle) {
            foreach ($vehicle->taxonomies as $tax_meta) {
                $taxonomy_meta_selected[] = $tax_meta->id;
            }
            foreach ($vehicle->features as $tax_meta) {
                $feature_selected[] = $tax_meta->id;
            }
        }
        return view('backend.vehicle', [
            'id' => $id,
            'vehicle' => $vehicle,
            'feature' => $feature,
            'feature_selected' => $feature_selected,
            'taxonomy_meta_selected' => $taxonomy_meta_selected,
            'sidebar' => $sidebar
        ]);
    }

    public function save(Request $request)
    {

        // Save Vehicle
        if(!$request['id']) $vehicle = new Vehicle();
        else $vehicle = Vehicle::find($request['id']);

        $vehicle->fill($request->all());
        $vehicle->save();

        $vehicle->taxonomies()->detach();
        $vehicle->taxonomies()->attach($request["taxonomy"]);

        $vehicle->features()->detach();
        $vehicle->features()->attach($request["feature"]);

        return redirect()->route('save_vehicle', ['id'=> $vehicle->id]);
    }

    public function remove($id)
    {

        // Save Vehicle
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->taxonomies()->detach();
        $vehicle->features()->detach();
        $vehicle->delete();

        return back();
    }
    
}
