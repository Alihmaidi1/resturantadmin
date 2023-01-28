<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class slider extends Model
{
    use HasFactory;


    use HasUuids;

    public $fillable=["logo","status","rank","resturant_id"];
    public $hidden=["created_at","updated_at"];


    public function getLogoattribute($value){

        return Storage::disk("resturant:".config("global.resturant_id"))->url($value);

    }
}
