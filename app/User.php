<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'GTD_USUARIO';

    protected $fillable = [
        'IDGTD_PERSONA', 'USU_USUARIO', 'USU_PASSWORD', 'CREATED_AT','UPDATED_AT','ESTADO'
    ];

    protected $hidden = [
        'USU_PASSWORD', 'REMEMBER_TOKEN'
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
