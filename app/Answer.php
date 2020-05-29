<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
        'answer',
        'image_name',
        'is_active',
        'is_correct',
];

public function question(){
    return $this->belongsTo(Question::class, 'question_id','id');
}
}
