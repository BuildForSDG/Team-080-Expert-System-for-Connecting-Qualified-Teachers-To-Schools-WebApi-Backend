<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id',
        'institution_id',
        'degree_id',
        'name',
        'start_date',
        'end_date',
        'cert_image',
    ];
}
