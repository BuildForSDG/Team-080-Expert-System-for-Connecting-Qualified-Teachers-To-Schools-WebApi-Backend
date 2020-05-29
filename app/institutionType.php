<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function institutiontype(){
        return $this->hasMany(Institution::class, 'institution_type_id','id');
    }
}
