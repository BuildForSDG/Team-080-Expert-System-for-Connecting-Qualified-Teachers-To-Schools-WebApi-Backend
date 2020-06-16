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
        'first_name',
        'last_name',
        'mobile_number',
        'address',
        'gender',
        'date_of_birth',
        'city_id',
        'country_id',
        'state_id'
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function quize(){
        return $this->hasOne(Quize::class, 'profile_id','id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

    public function qualification(){
        return $this->hasOne(Qualification::class, 'profile_id','id');
    }

}
