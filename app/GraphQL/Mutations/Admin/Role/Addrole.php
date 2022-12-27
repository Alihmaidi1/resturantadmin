<?php

namespace App\GraphQL\Mutations\Admin\Role;

use App\Exceptions\CustomException;
use App\Models\role;
use App\repo\interfaces\roleinterface;

final class Addrole
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $role;
    public function __construct(roleinterface $role)
    {

        $this->role = $role;

    }
    public function __invoke($_, array $args)
    {

        $permissions=$args["permission"];
        $name_ar = $args["name_ar"];
        $name_en = $args["name_en"];
        $resturant_id = isset($args["resturant_id"]) ? $args["resturant_id"] : null;
        $role1 = $this->role->store($name_ar, $name_en, $permissions, $resturant_id);
        $role1->message = trans("admin.the role was added successfully");
        return $role1;

    }
}
