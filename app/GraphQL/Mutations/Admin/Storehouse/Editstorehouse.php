<?php

namespace App\GraphQL\Mutations\Admin\Storehouse;

use App\Models\storehouse;

final class Editstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $storehouse=storehouse::find($args["id"]);
        $storehouse->name=$args["name"];
        $storehouse->address=$args["address"];
        $storehouse->isFull=$args["isFull"];
        $storehouse->resturant_id=$args["resturant_id"];
        $storehouse->save();
        $storehouse->message=trans("admin.the storehouse was updated successfully");
        return $storehouse;

    }
}
