<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_experience extends Model
{
    use HasFactory;

    use HasUuids;

    public $fillable=["year","benifit","vacation","resturant_id"];
    public $hidden=["created_at","updated_at"];

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }

    public function employees(){

        return $this->hasMany("App\Models\\employee","experience_id");

    }


}
