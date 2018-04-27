<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wish_list';

    public function taxonomies()
    {
        return $this->belongsToMany('App\TaxonomyMeta', 'rel_wish_list_taxonomy_meta', 'wish_list_id', 'taxonomy_meta_id');
    }
}
