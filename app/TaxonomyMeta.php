<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxonomyMeta extends Model
{
    protected $table = 'taxonomy_metas';

    protected $fillable = [
        'name', 'slug', 'taxonomy_id'
    ];

    public function taxonomy()
    {
        return $this->belongsTo('App\Taxonomy', 'taxonomy_id');
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle', 'rel_vehicle_taxonomy_meta', 'taxonomy_meta_id', 'vehicle_id');
    }

}
