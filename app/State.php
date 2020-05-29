<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
    ];

    public function state(){
        return $this->belongsTo(Country::class, 'country_id','id');
    }

    public function institution(){
        return $this->hasMany(Institution::class, 'state_id','id');
    }

    public function city(){
        return $this->hasMany(City::class, 'state_id','id');
    }
    
}
