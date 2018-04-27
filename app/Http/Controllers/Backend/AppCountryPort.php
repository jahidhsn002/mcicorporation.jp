<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\Country;
use App\Port;

class AppCountryPort extends Controller
{
    public function index()
    {
        $sidebar = Sidebar::all();
        $countries = Country::all();
        return view('backend.country', [
            'sidebar' => $sidebar,
            'countries' => $countries
        ]);
    }

    public function port_index($country_id)
    {
        $sidebar = Sidebar::all();
        $country = Country::find($country_id);
        $ports = Port::where('country_id', $country_id)->get();
        return view('backend.port', [
            'country' => $country,
            'sidebar' => $sidebar,
            'ports' => $ports
        ]);
    }

    public function remove($id)
    {

        // Save Vehicle
        $country = Country::findOrFail($id);
        foreach ($country->ports as $port) {
            (Port::find($port->id))->delete();
        }
        $country->delete();

        return back();
    }

    public function port_remove($id)
    {

        // Save Vehicle
        $port = Port::findOrFail($id);
        $port->delete();

        return back();
    }

    public function save(Request $request)
    {
        // Save Country
        if(!$request['id']) $country = new Country();
        else $country = Country::find($request['id']);

        $country->fill($request->all());
        $country->save();

        return back();
    }

    public function port_save(Request $request)
    {
        // Save Country
        if(!$request['id']) $port = new Port();
        else $port = Port::find($request['id']);

        $port->fill($request->all());
        $port->save();

        return back();
    }
}
