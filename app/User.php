<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'country', 'city', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle', 'rel_user_vehicle', 'user_id', 'vehicle_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\WishList', 'user_id');
    }
}
