<?php

namespace App\Http\Controllers\Core;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Vehicle;
use App\Taxonomy;
use App\TaxonomyMeta;

class Sidebar
{
    static function all()
    {
    	$data = [];
    	$app = new Sidebar();
    	$taxonomy = Taxonomy::all();
        $data['tz'] = 'Bangladesh Time';
        $data['time'] = Carbon::now('Asia/Dhaka')->format('h:i:s A');
        $data['new_cars'] = Vehicle::whereHas('taxonomies', function ($query) {
                                $query->where('slug', 'new-arrivals');
                            })
                            ->limit(25)
                            ->get();
    	$data['taxonomy'] = $taxonomy;
    	foreach ($taxonomy as $tax) {
    		$slug = $tax->slug;
    		$data[$slug] = $app->get_taxonomy_meta($slug);
    	}
        return (object)$data;
    }

    public function get_taxonomy_meta($tex_slug)
    {
        $tex = Taxonomy::where('slug', $tex_slug)->first();
        $metas = TaxonomyMeta::where('taxonomy_id', $tex->id)->get();
        return $metas;
    }
}
