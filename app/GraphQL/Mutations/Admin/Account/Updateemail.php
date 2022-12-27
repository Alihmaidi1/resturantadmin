<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\repo\interfaces\accountinterface;

final class Updateemail
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

        $admin=auth()->user();
        $id = $admin->id;
        $email=$args["email"];
        $name=isset($args["name"])?$args["name"]:$admin->name;
        $age=isset($args["age"])?$args["age"]:$admin->age;
        $gender=isset($args["gender"])?$args["gender"]:$admin->getRawOriginal("gender");
        $admin=$this->account->updateProfile($id,$email, $name, $age, $gender);
        $admin->message=trans("admin.the email was updated successfully");
        return $admin;

    }
}
