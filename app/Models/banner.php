<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class banner extends Model
{
    use HasFactory;

    use HasUuids;
    public $fillable=["logo","where_show","status","url","rank"];

    public $hidden=["created_at","updated_at"];



    public function getLogoattribute($value){


        return Storage::disk("resturant:".config("global.resturant_id"))->url($value);


    }


}
