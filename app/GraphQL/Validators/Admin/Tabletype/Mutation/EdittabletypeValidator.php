<?php

namespace App\GraphQL\Validators\Admin\Tabletype\Mutation;

use App\Rules\checkCurrencyResturant;
use Nuwave\Lighthouse\Validation\Validator;

final class EdittabletypeValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        $inputs = $this->args->toArray();
        $resturant_id = isset($inputs["resturant_id"]) ? $inputs["resturant_id"] : null;
        return [

            "price"=>["required"],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "currency_id"=>["required",new checkCurrencyResturant($resturant_id)],
            "resturant_id"=>["required","exists:resturants,id"],
            "id"=>["required","exists:tabletypes,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "price.required"=>trans("admin.price is required"),
            "name_en.required"=>trans("admin.name in english is required"),
            "name_ar.required"=>trans("admin.name in arabic is required"),
            "currency_id.required"=>trans("admin.the currency id is required"),
            "currency_id.exists"=>trans("admin.the currency id is not exists in data"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")

        ];
    }

}
