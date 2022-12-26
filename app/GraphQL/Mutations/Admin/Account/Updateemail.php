<?php

namespace App\GraphQL\Mutations\Admin\Account;

final class Updateemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=auth()->user();
        $admin->email=$args["email"];
        $admin->name=isset($args["name"])?$args["name"]:$admin->name;
        $admin->age=isset($args["age"])?$args["age"]:$admin->age;
        $admin->gender=isset($args["gender"])?$args["gender"]:$admin->getRawOriginal("gender");
        $admin->save();
        $admin->message=trans("admin.the email was updated successfully");
        return $admin;

    }
}
