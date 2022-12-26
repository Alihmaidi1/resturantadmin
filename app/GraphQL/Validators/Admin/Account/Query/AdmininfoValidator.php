<?php

namespace App\GraphQL\Validators\Admin\Account\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class AdmininfoValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "id"=>["required","exists:admins,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id field is required"),
            "id.exists"=>trans("admin.id not found in our data")

        ];
    }

}
