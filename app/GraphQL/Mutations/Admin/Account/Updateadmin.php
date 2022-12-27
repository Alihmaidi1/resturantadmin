<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Models\admin;
use App\repo\interfaces\accountinterface;
use Illuminate\Support\Facades\Hash;

final class Updateadmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $account;
    public function __construct(accountinterface $account)
    {

        $this->account = $account;
    }
    public function __invoke($_, array $args)
    {

        $id=$args["id"];
        $admin = $this->account->find($id);
        $email=$args["email"];
        $role_id=$args["role_id"];
        $resturant_id=$args["resturant_id"];
        $rank=$args["rank"];
        $password = isset($args["password"])?$args["password"]:null;
        $name = isset($args["name"])?$args["name"]:$admin->name;
        $age = isset($args["age"])?$args["age"]:$admin->age;
        $gender = isset($args["gender"])?$args["gender"]:$admin->gender;
        $admin=$this->account->updateAdmin($id, $email, $role_id, $resturant_id, $rank, $password, $name, $age, $gender);
        $admin->message=trans("admin.the admin was updated successfully");
        return $admin;

    }
}
