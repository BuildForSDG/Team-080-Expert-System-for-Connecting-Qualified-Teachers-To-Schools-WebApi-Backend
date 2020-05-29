<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id',
        'name',
    ];

    public function question(){
        return $this->hasMany(Question::class, 'subject_id','id');
    }

    public function level(){
        return $this->belongsTo(Level::class, 'level_id','id');
    }
}
