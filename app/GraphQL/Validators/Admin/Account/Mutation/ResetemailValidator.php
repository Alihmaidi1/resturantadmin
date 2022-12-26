<?php

namespace App\GraphQL\Validators\Admin\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class ResetemailValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "email"=>["email","required","exists:admins,email"],
            "resturant_id"=>["exists:resturants,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.exists"=>trans("admin.your data not exists in our system"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")

        ];
    }


}
