<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;

final class Changepassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin = auth('api')->user();
        $admin->password=Hash::make($args["password"]);
        $admin->save();


        $admin->message=trans("admin.the password was updated successfully");

        $token = tokenInfo($admin->email,$args['password'],"admins");

        if($token->status()==200){
            $admin->token_info=$token->json();
            auth("api")->user()->token()->revoke();

            return $admin;
        }else{
            throw new CustomException(trans("admin.we have error"));
        }

    }
}
