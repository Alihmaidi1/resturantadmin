<?php

namespace App\GraphQL\Validators\Admin\Role\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetallroleValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "resturant_id"=>["exists:resturants,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")

        ];
    }
}
