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
        $id = isset($inputs["id"])?$inputs["id"]:null;
        return [
            "id" => ["required", "exists:admins,id"],
            "email" => ["required","unique:admins,email,".$id],
            "role_id" => ["required","not_in:1","exists:roles,id"],
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
            "rank.required"=>trans("admin.rank is required"),
            "role_id.not_in"=>trans("admin.this role for super admin"),
            "name.required"=>trans("admin.name is required"),
            "age.integer"=>trans("admin.age should be integer"),
            "gender.in"=>trans("admin.gender should is 0 or 1")


        ];
    }

}
