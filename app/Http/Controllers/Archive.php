<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\User;
use App\Port;
use App\Country;
use App\Vehicle;
use App\Feature;
use App\Taxonomy;
use App\TaxonomyMeta;

use App\Mail\Inquary;

class Archive extends Controller
{

    public function home()
    {
        $sidebar = Sidebar::all();

        $new_arrivals = Vehicle::whereHas('taxonomies', function ($query) {
                                    $query->where('slug', 'new-arrivals');
                                })
                                ->limit(12)
                                ->get();
        $best_deals = Vehicle::whereHas('taxonomies', function ($query) {
                                    $query->where('slug', 'best-deals');
                                })
                                ->limit(12)
                                ->get();
        $premium_class = Vehicle::whereHas('taxonomies', function ($query) {
                                    $query->where('slug', 'premium-class');
                                })
                                ->limit(12)
                                ->get();

        $populars = Vehicle::whereHas('taxonomies', function ($query) {
                                    $query->where('slug', 'popular');
                                })
                                ->limit(24)
                                ->get();

        foreach ($sidebar->{'body-type'} as $type) {
                $vehicles = Vehicle::orderBy('name', 'desc')
                    ->whereHas('taxonomies', function ($query) use ($type) {
                                        $query->where('taxonomy_meta_id', $type->id);
                                    })
                    ->whereHas('taxonomies', function ($query){
                                        $query->where('slug', 'best-of-type');
                                    })
                    ->limit(3)
                    ->get();
                $type->vehicles = $vehicles;
        }

        return view('home', [
            'taxonomy_selected' => [],
            'new_arrivals' => $new_arrivals,
            'best_deals' => $best_deals,
            'premium_class' => $premium_class,
            'populars' => $populars,
            'sidebar' => $sidebar
        ]);
    }

    public function archive(Request $req)
    {
        $feature_selected = [];
        $taxonomy_selected = [];

        if($req["order-key"]&&$req["order-by"]):
            $vehicles = Vehicle::orderBy($req["order-by"], $req["order-key"]);
        else:
            $vehicles = Vehicle::orderBy('name', 'desc');
        endif;

        if($req["search"]):
            $vehicles->where('name', 'like', '%'.$req["search"].'%');
        endif;

        // Price
        if($req["price-from"]):
            $vehicles->where('price', '>', $req["price-from"]);
        endif;
        if($req["price-to"]):
            $vehicles->where('price', '<', $req["price-to"]);
        endif;

        // Milage
        if($req["mileage-from"]):
            $vehicles->where('mileage', '>', $req["mileage-from"]);
        endif;
        if($req["mileage-to"]):
            $vehicles->where('mileage', '<', $req["mileage-to"]);
        endif;

        // Price
        if($req["engine-from"]):
            $vehicles->where('engine', '>', $req["engine-from"]);
        endif;
        if($req["engine-to"]):
            $vehicles->where('engine', '<', $req["engine-to"]);
        endif;

        if($req["taxonomy"]):
            $req["taxonomy"] = array_filter($req["taxonomy"]);
            $taxonomy_selected = $req["taxonomy"];
            foreach ($req["taxonomy"] as $taxonomy) {
                $vehicles->whereHas('taxonomies', function ($query) use ($req, $taxonomy) {
                    $query->where('taxonomy_meta_id', $taxonomy);
                });
            }
        endif;

        if($req["feature"]):
            $req["feature"] = array_filter($req["feature"]);
            $feature_selected = $req["feature"];
            foreach ($req["feature"] as $feature) {
                $vehicles->whereHas('features', function ($query) use ($req, $feature) {
                    $query->where('feature_id', $feature);
                });
            }
        endif;

        $vehicles = $vehicles->paginate(10);
        $features = Feature::all();
        $sidebar = Sidebar::all();
        $countries = Country::all();
        $country = Country::find($req['country_id']);
        // Port List
        $dbPort = Port::orderBy('name', 'desc');
        if($req['country_id']) $dbPort->where('country_id', $req["country_id"]);
        $ports = $dbPort->get();

        $port = Port::find($req['port_id']);

        foreach ($vehicles as $vehicle) {
            $vehicle->total = $vehicle->price;
            if($req["insurance"]=='On'&&$port) $vehicle->total += $port->insurance;
            if($req["inspection"]=='On'&&$port) $vehicle->total += $port->inspection;
            if($req["warranty"]=='On'&&$port) $vehicle->total += $port->warranty;
            if($req["certificate"]=='On'&&$port) $vehicle->total += $port->certificate;
        }

        return view('archive', [
            'taxonomy_selected' => $taxonomy_selected,
            'feature_selected' => $feature_selected,
            'vehicles' => $vehicles,
            'features' => $features,
            'countries' => $countries,
            'country' => $country,
            'sidebar' => $sidebar,
            'ports' => $ports,
            'port' => $port
        ]);
    }

    public function single($id = null, Request $req)
    {
        $feature_selected = [];
        $sidebar = Sidebar::all();
        $features = Feature::all();
        $countries = Country::all();
        $ports = Port::where('country_id', $req['country_id'])->get();
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            foreach ($vehicle->features as $tax_meta) {
                $feature_selected[] = $tax_meta->id;
            }
        }
        return view('single', [
            'ports' => $ports,
            'vehicle' => $vehicle,
            'sidebar' => $sidebar,
            'features' => $features,
            'countries' => $countries,
            'feature_selected' => $feature_selected
        ]);
    }

    public function inquary_email(Request $req)
    {
        $vehicle = Vehicle::findOrFail($req['vehicle_id']);
        $country = Country::findOrFail($req['country_id']);
        $port = Port::findOrFail($req['port_id']);

        $user = new User();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->phone = $req['phone'];
        $user->city = $req['city'];
        $user->address = $req['address'];

        Mail::to($user)->cc([
            ['email'=>'hublink3@gmail.com', 'name'=>'Hub Link']
        ])->send(new Inquary(
            $user, $country, $port, $vehicle
        ));
        return back();
    }


}
