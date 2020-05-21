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
];
}
