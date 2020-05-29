<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
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

    public function subject(){
        return $this->hasOne(Subject::class, 'level_id','id');
    }
}
