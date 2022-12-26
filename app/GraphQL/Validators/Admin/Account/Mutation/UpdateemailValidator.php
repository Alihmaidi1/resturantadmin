<?php

namespace App\GraphQL\Validators\Admin\Account\Mutation;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class UpdateemailValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        $inputs=$this->args->toArray();
        $email=isset($inputs["email"])?$inputs["email"]:null;
        return [
            "email" => [
                "required",
                Rule::unique("admins")->where(function ($query) use ($email) {

                    return $query->where("email", $email)->where("resturant_id",auth("api")->user()->resturant_id);

            })->ignore(auth()->user()->id)
            ],
            "name"=>["required"],
            "age"=>["integer"],
            "gender"=>["in:0,1"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email is required"),
            "name.required"=>trans("admin.name is required"),
            "age.integer"=>trans("admin.age should be integer"),
            "gender.in"=>trans("admin.gender should is 0 or 1")
        ];
    }


}
