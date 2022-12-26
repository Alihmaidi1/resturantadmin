<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storehouse extends Model
{

    use HasFactory;


    use HasUuids;

    public $fillable=["name","address","isFull","resturant_id"];
    public $hidden=["created_at","updated_at"];
    public function resturant(){

        return $this->belongsTo("\App\Models\\resturant","resturant_id");
    }

    public function goods(){

        return $this->belongsToMany("\App\Models\good","\App\Models\goodstore","good_id","storehouse_id");
    }


}
