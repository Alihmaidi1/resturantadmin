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

        $inputs = $this->args->toArray();
        $email=isset($inputs["email"])?$inputs["email"]:null;
        $resturant_id=isset($inputs["resturant_id"])?$inputs["resturant_id"]:null;
        $role_id = isset($inputs["role_id"]) ? $inputs["role_id"] : null;
        return [
            "email" => [
                "required",
                "email",
                Rule::unique("admins")->where(function ($query) use ($email, $resturant_id) {
                    return $query->where("email", $email)->where("resturant_id", $resturant_id);
                })

            ],
            "password" => ["required"],
            "role_id" => [
                "required",
                Rule::exists("roles","id")->where(function ($query) use ($role_id, $resturant_id) {
                    return $query->where("id", $role_id)->where("resturant_id", $resturant_id);
                })
            ],
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
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "rank.required"=>trans("admin.rank is required"),
            "name.string"=>trans("admin.the name should be string"),
            "age.integer"=>trans("admin.age should be integer"),
            "gender.in"=>trans("admin.gender value should be 0 or 1")

        ];
    }

}
