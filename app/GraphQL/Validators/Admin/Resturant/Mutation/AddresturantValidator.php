<?php

namespace App\GraphQL\Validators\Admin\Resturant\Mutation;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class AddresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "name"=>["required","string"],
            "domain"=>["required","unique:resturants,domain"]
        ];
    }


    public function messages(): array  {

        return [

            "name.required"=>trans("admin.the name is required"),
            "name.string"=>trans("admin.the name should be string"),
            "domain.required"=>trans("admin.the domain is required"),
            "domain.unique"=>trans("admin.this domain is exists")


        ];


    }

}
