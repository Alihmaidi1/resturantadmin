<?php

namespace App\GraphQL\Validators\Admin\Account\Mutation;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class UpdateadminValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        $inputs = $this->args->toArray();
        $email = isset($inputs["email"])?$inputs["email"]:null;
        $id = isset($inputs["id"])?$inputs["id"]:null;
        $resturant_id = isset($inputs["resturant_id"])?$inputs["resturant_id"]:null;
        return [
            "id" => ["required", "exists:admins,id"],
            "email" => [
                "required",
                Rule::unique("admins")->where(function ($query) use ($email, $resturant_id) {
                    return $query->where("email", $email)->where("resturant_id",$resturant_id);
                })->ignore($id)
            ],
            "role_id"=>["required","exists:roles,id","not_in:1"],
            "resturant_id"=>["required","exists:resturants,id"],
            "rank"=>["required"],
            "name"=>["required"],
            "age"=>["integer"],
            "gender"=>["in:0,1"]


        ];
    }



    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "email.required"=>trans("admin.email is required"),
            "role_id.required"=>trans("admin.role id is required"),
            "role_id.exists"=>trans("admin.role id is not exists in our data"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "rank.required"=>trans("admin.rank is required"),
            "role_id.not_in"=>trans("admin.this role for super admin"),
            "name.required"=>trans("admin.name is required"),
            "age.integer"=>trans("admin.age should be integer"),
            "gender.in"=>trans("admin.gender should is 0 or 1")


        ];
    }

}
