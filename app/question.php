<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'question',
        'image_name',
        'is_german',
        'is_active',
    ];
}
