<?php

namespace App\GraphQL\Validators\Admin\Currency\Mutation;

use App\Models\currency;
use App\Rules\checkDefaultCurrency;
use Nuwave\Lighthouse\Validation\Validator;

final class AddcurrenyValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        $inputs = $this->args->toArray();
        $default = (isset($inputs["is_default"])) ? $inputs["is_default"] : null;

        return [


            "code"=>["required","unique:currencies,code"],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "precent_value_in_dular"=>["required"],
            "is_default"=>["required",new checkDefaultCurrency($default)]

        ];
    }


    public function messages(): array
    {

        return [

            "code.required"=>trans("admin.the code is required"),
            "code.exists"=>trans("admin.the currency is already exists"),
            "name_en.required"=>trans("admin.the name in english is required"),
            "name_ar.required"=>trans("admin.the name in arabic is required"),
            "precent_value_in_dular.required"=>trans("admin.the precent value in dular is required"),
            "is_default.required"=>trans("admin.is default is required")
        ];


    }


}
