<?php

namespace App\GraphQL\Mutations\Admin\Role;

use App\Exceptions\CustomException;
use App\Models\role;

final class Addrole
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $permissions=$args["permission"];
        $counter=0;
        foreach($permissions as $permission){
            foreach(config("global.permssion") as $key=>$per){
                if($key==$permission){

                    $counter++;
                }
            }
        }
        if($counter!=count($permissions)){

            throw new CustomException(trans("admin.you have error value in permission"));

        }
        $role=role::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "permssions"=>json_encode($permissions),
            "resturant_id"=>isset($args["resturant_id"])?$args["resturant_id"]:null
        ]);
        $role->message = trans("admin.the role was added successfully");

        return $role;

    }
}
