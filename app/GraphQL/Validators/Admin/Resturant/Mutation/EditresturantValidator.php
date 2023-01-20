<?php

namespace App\GraphQL\Validators\Admin\Resturant\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        $args = $this->args->toArray();
        $id = isset($args["id"]) ? $args["id"] : null;
        return [


            "id"=>["required","exists:resturants,id"],
            "name"=>["required","string"],
            "domain"=>["required","unique:resturants,domain,".$id]
        ];
    }


    public function messages(): array  {

        return [

            "name.required"=>trans("admin.the name is required"),
            "name.string"=>trans("admin.the name should be string"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "domain.required"=>trans("admin.the domain is required"),
            "domain.unique"=>trans("admin.this domain is exists")

        ];


    }

}
