<?php

namespace App\GraphQL\Validators\Admin\Banner\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetbannerwhereshowValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "where_show"=>["required"]
        ];
    }


    public function messages(): array
    {

        return [

            "where_show.required"=>trans("admin.where show field is"),

        ];
    }
}
