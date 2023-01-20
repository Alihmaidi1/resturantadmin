<?php

namespace App\GraphQL\Validators\Admin\Role\Mutation;

use App\Models\role;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Nuwave\Lighthouse\Validation\Validator;

final class DeleteroleValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:roles,id",
            ValidationRule::notIn(role::first()->id)
            ]


        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id field is required"),
            "id.not_in"=>trans("admin.can't delete super role"),
            "id.exists"=>trans("admin.id not found in our data")

        ];
    }

}
