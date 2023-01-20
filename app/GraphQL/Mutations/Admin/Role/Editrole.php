<?php

namespace App\GraphQL\Mutations\Admin\Role;

use App\Exceptions\CustomException;
use App\Models\role;
use App\repo\interfaces\roleinterface;

final class Editrole
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
        $id=$args['id'];
        $name_en = $args["name_en"];
        $name_ar=$args["name_ar"];
        $role1 = $this->role->update($id, $name_en, $name_ar, $permissions);
        $role1->message=trans("admin.the role was updated successfully");
        return $role1;


    }
}
