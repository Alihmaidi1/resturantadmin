<?php

namespace App\GraphQL\Validators\Admin\Chat\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetchatresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "resturant_id"=>["required","exists:resturants,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")

        ];
    }
}
