<?php

namespace App\GraphQL\Mutations\Admin\Role;

use App\Models\role;
use App\repo\interfaces\roleinterface;

final class Deleterole
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
        $id = $args["id"];
        $role1=$this->role->delete($id);
        $role1->message=trans("admin.the role was deleted successfully");
        return $role1;


    }
}
