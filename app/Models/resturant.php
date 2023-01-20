<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant extends Model
{
    use HasFactory;

    use HasUuids;
    public $fillable=["name","database_name","domain"];

    public $hidden=["created_at","updated_at"];


    public function chats(){

        return $this->hasMany(chat::class,"resturant_id");

    }


    public function  aws(){

        return $this->hasOne(aws::class,"resturant_id");
    }





}
