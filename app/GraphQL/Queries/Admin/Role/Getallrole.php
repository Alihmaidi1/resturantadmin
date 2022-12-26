<?php

namespace App\GraphQL\Queries\Admin\Role;

use App\Models\role;

final class Getallrole
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant_id=isset($args["resturant_id"])?$args["resturant_id"]:null;
        return role::where("resturant_id", $resturant_id)->get();


    }
}
