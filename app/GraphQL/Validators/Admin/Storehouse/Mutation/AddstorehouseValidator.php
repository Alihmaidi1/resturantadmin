<?php

namespace App\GraphQL\Validators\Admin\Storehouse\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddstorehouseValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name"=>["required"],
            "address"=>["required"],
            "isFull"=>["required"],

        ];
    }
    public function messages(): array
    {
        return [

            "name.required"=>trans("admin.name is required"),
            "address.required"=>trans("admin.address is required"),
            "isFull.required"=>trans("admin.isFull is required"),

        ];
    }

}
