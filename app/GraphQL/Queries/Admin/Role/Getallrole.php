<?php

namespace App\GraphQL\Queries\Admin\Role;

use App\Models\role;
use App\repo\interfaces\roleinterface;

final class Getallrole
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


        $resturant_id=isset($args["resturant_id"])?$args["resturant_id"]:null;

        return $this->role->getAllRole($resturant_id);


    }
}
