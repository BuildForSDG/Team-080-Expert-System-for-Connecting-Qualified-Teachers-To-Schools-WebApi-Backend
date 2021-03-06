<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail,JWTSubject
{
    //use HasApiTokens;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phonenumber',
        'user_type_id',
        'gender',
        'country_id',
        'state_id',
        'api_token',
        'email',
        'email_verified_at',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id','id');
    }

    public function usertype(){
        return $this->belongsTo(UserType::class, 'user_type_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id','id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id','id');
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

}
