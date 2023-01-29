<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    use HasUuids;
    public $fillable=["user_id"];


    public $hidden=["created_at","updated_at"];

    public function messages(){

        return $this->hasMany(message::class,"chat_id");
    }

}
