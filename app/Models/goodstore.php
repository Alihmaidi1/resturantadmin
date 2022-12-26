<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goodstore extends Model
{
    use HasFactory;


    use HasUuids;

    public $fillable=["quantity","min_quantity","good_id","storehouse_id"];
    public $hidden=["created_at","updated_at"];
}
