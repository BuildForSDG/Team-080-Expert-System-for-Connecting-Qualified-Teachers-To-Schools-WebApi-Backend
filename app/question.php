<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
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

    public function answer(){
        return $this->hasOne(Answer::class, 'question_id','id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }
}
