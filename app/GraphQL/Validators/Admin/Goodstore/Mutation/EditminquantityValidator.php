<?php

namespace App\GraphQL\Validators\Admin\Goodstore\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditminquantityValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:goodstores,id"],
            "min_quantity"=>["required"]
        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "min_quantity.required"=>trans("admin.min quantity is required")

        ];
    }

}
