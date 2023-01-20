<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class admin extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens,HasUuids;
    public $fillable=["name","age","gender","email","password","reser_code","role_id","rank","resturant_id"];

    public $hidden=["created_at","updated_at","password"];

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getGenderAttribute($value){

        return ($value == 0) ? trans("admin.male") : trans("admin.female");
    }


    


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function role(){

        return $this->belongsTo("App\Models\\role","role_id");

    }


}
