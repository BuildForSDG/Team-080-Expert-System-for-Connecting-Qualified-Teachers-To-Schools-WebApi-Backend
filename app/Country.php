<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso_three',
        'iso_two',
        'short_name',
        'long_name',
        'numcode',
        'un_member',
        'calling_code',
        'cctld',
        'currency_name',
        'currency_symbol',
];

public function state(){
  return $this->hasMany(State::class, 'country_id','id');
}

public function user(){
  return $this->hasMany(User::class, 'country_id','id');
}


}
