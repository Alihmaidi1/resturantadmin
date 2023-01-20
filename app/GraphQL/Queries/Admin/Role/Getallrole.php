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



        return $this->role->getAllRole();


    }
}
