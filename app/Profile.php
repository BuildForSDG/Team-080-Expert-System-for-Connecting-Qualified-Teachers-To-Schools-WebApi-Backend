<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'mobile_number',
        'address',
        'gender',
        'date_of_birth',
        'city_id',
    ];
}
