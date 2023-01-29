<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    use HasUuids;
    public $fillable=["chat_id","content","sendBy","status","created_at"];
    public $hiiden=["chat_id","updated_at"];

    public function chat(){

        return $this->belongsTo("\App\Models\chat","chat_id");
    }

}
