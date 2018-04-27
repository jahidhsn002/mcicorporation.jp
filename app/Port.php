<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $table = 'ports';
    
    protected $fillable = [
        'name', 'insurance', 'inspection', 'certificate', 'warranty', 'country_id'
    ];
}
