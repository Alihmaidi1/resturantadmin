<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Models\admin;
use Illuminate\Support\Facades\Hash;

final class Createadmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $resturantID = isset($args["resturant_id"]) ? $args["resturant_id"] : null;
        $admin=admin::create([
            "email"=>$args["email"],
            "password"=>Hash::make($args["password"]),
            "role_id"=>$args["role_id"],
            "resturant_id"=>$resturantID,
            "rank"=>$args["rank"],
            "name"=>isset($args["name"])?$args["name"]:null,
            "age"=>isset($args["age"])?$args["age"]:null,
            "gender"=>isset($args["gender"])?$args["gender"]:null
        ]);
        $admin->message=trans("admin.the admin was created successfully");
        return $admin;



    }
}
