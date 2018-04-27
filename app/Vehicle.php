<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
    	'name', 'thumbnail', 'gallery', 'ref_no', 'actual_price', 'price', 'model_code', 'manufacture', 'engine', 'mileage',
    	'chassis', 'engine_code', 'seats', 'dors', 'dimension', 'm3', 'weight', 'registration'
    ];

    public function taxonomies()
    {
        return $this->belongsToMany('App\TaxonomyMeta', 'rel_vehicle_taxonomy_meta', 'vehicle_id', 'taxonomy_meta_id');
    }

    public function features()
    {
        return $this->belongsToMany('App\Feature', 'rel_vehicle_feature', 'vehicle_id', 'feature_id');
    }
}
