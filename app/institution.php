<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
             'state_id',
            'institution_type_id',
            'name',
    ];
}
