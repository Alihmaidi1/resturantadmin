<?php

namespace App\GraphQL\Validators\Admin\Currency\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditcurrencyValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:currencies,id"],
            "code"=>["required"],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "precent_value_in_dular"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "is_default"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id should be exists"),
            "code.required"=>trans("admin.code is required"),
            "name_en.required"=>trans("admin.the name in english is required"),
            "name_ar.required"=>trans("admin.the name in arabic is required"),
            "precent_value_in_dular.required"=>trans("admin.the precent value in dular is required"),
            "is_default_for_website.required"=>trans("admin.the field is default is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "is_default.required"=>trans("admin.is default is required")
        ];
    }


}
