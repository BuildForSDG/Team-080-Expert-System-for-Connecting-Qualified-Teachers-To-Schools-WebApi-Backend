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

    public function profile(){
        return $this->belongsTo(Profile::class, 'profile_id','id');
    }

    public function institution(){
        return $this->belongsTo(Institution::class, 'institution_id','id');
    }

    public function degree(){
        return $this->belongsTo(Degree::class, 'degree_id','id');
    }
}
