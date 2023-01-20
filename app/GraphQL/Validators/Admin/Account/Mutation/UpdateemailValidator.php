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
        return [
            "email" => ["required","unique:admins,email,".auth()->user()->id],
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
