<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Models\admin;
use App\repo\interfaces\accountinterface;
use Illuminate\Support\Facades\Hash;

final class Createadmin
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
        $email = $args["email"];
        $password = $args["password"];
        $role_id = $args["role_id"];
        $rank = $args["rank"];
        $name = isset($args["name"]) ? $args["name"] : null;
        $age = isset($args["age"]) ? $args["age"] : null;
        $gender = isset($args["gender"]) ? $args["gender"] : null;
        $admin=$this->account->createAdmin($email, $password, $role_id, $rank, $name, $age, $gender);
        $admin->message=trans("admin.the admin was created successfully");
        return $admin;



    }
}
