<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state_id',
];

public function state(){
    return $this->belongsTo(State::class, 'state_id','id');
}

public function quize(){
    return $this->belongsTo(Quize::class, 'profile_id','id');
}

public function profile(){
    return $this->hasOne(Profile::class, 'city_id','id');
}
}
