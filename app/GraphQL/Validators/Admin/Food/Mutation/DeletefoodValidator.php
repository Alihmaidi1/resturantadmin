<?php

namespace App\GraphQL\Validators\Admin\Food\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeletefoodValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:food,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exsits in our data")

        ];
    }

}
