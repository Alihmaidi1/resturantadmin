<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class image extends Model
{
    use HasFactory;


    use HasUuids;
    public $fillable=["url","imageable_id","imageable_type","resturant_id","created_at","updated_at"];
    public $hidden=["created_at","updated_at"];

    public function imageable(){

        return $this->morphTo();
    }

    public function getUrlattribute($value){


        return Storage::disk("resturant:".config("global.resturant_id"))->url($value);

    }



}
