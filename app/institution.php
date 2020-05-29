<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
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

    public function state(){
        return $this->belongsTo(State::class, 'state_id','id');
    }

    public function institutiontype(){
        return $this->belongsTo(InstitutionType::class, 'institution_type_id','id');
    }
}
