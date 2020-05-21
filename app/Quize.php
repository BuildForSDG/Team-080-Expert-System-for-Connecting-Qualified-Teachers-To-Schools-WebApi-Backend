<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id',
        'total_questions',
        'answers',
        'score',
    ];
}
