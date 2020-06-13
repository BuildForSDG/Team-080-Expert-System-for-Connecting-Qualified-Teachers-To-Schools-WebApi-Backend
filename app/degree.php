<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name',
            'code',
];

public function qualification(){
    return $this->hasOne(Qualification::class, 'degree_id','id');
}
}
