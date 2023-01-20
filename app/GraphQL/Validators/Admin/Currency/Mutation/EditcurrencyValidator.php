<?php

namespace App\GraphQL\Validators\Admin\Currency\Mutation;

use App\Rules\checkDefaultCurrency;
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

        $inputs = $this->args->toArray();
        $currency_id = isset($inputs["id"]) ? $inputs["id"] : null;
        $default = isset($inputs["is_default"]) ? $inputs["is_default"] : null;
        return [
            "id"=>["required","exists:currencies,id"],
            "code"=>["required","unique:currencies,code,".$currency_id],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "precent_value_in_dular"=>["required"],
            "is_default"=>["required",new checkDefaultCurrency($default,$currency_id)]
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
            "is_default.required"=>trans("admin.is default is required")
        ];
    }


}
