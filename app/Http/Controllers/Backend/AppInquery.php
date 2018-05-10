<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Port;
use App\Country;
use App\Vehicle;

class AppInquery extends Controller
{
    public function index(Request $req)
    {
        $user = $vehicle = (object)[];
        $country = $port = null;

        // Get User
        if(Auth::check())
            $user = $req->user();

        // Country List
        if($req['countrySearch'])
            $countries = Country::where('name', 'like', '%'.$req["countrySearch"].'%')->get();
        else
            $countries = Country::all();

        // Get Country
        if($req['country_id']) $country = Country::find($req["country_id"]);

        // Port List
        $dbPort = Port::orderBy('name', 'desc');
        if($req['country_id']) $dbPort->where('country_id', $req["country_id"]);
        if($req['portSearch']) $dbPort->where('name', 'like', '%'.$req["portSearch"].'%');
        $ports = $dbPort->get();

        // Get Port
        if($req['port_id']) $port = Port::find($req["port_id"]);

        // Get Vehicle
        if($req['vehicle_id']){

            $vehicle = Vehicle::find($req["vehicle_id"]);
            $vehicle->total = $vehicle->price;

            if($req["insurance"]=='On'&&$port) $vehicle->total += $port->insurance;
            if($req["inspection"]=='On'&&$port) $vehicle->total += $port->inspection;
            if($req["warranty"]=='On'&&$port) $vehicle->total += $port->warranty;
            if($req["certificate"]=='On'&&$port) $vehicle->total += $port->certificate;
            
        }

        return response()->json([
            'user' => $user,
            'vehicle' => $vehicle,
            'countries' => $countries,
            'country' => $country,
            'ports' => $ports,
            'port' => $port
        ]);
    }
}
