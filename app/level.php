<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level_group',
    ];
}
