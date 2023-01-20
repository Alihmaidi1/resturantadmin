<?php

namespace App\GraphQL\Validators\Admin\Account\Mutation;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class CreateadminValidator extends Validator
{

    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        return [
            "email" => ["required","email","unique:admins,email"],
            "password" => ["required"],
            "role_id" => ["required","exists:roles,id"],
            "rank"=>["required"],
            "name"=>["string"],
            "age"=>["integer"],
            "gender"=>["in:0,1"]

        ];
    }


    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.unique"=>trans("admin.The Email is found in our data"),
            "password.required"=>trans("admin.password field is required"),
            "role_id.exists"=>trans("admin.the role is not found in our data"),
            "role_id.required"=>trans("admin.the role is required"),
            "rank.required"=>trans("admin.rank is required"),
            "name.string"=>trans("admin.the name should be string"),
            "age.integer"=>trans("admin.age should be integer"),
            "gender.in"=>trans("admin.gender value should be 0 or 1")

        ];
    }

}
