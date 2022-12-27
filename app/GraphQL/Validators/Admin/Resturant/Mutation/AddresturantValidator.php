<?php

namespace App\GraphQL\Validators\Admin\Resturant\Mutation;

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


            "address"=>["required","string"],
            "name"=>["required","string"],
            "domain"=>["required","url"]

        ];
    }


    public function messages(): array  {

        return [

            "address.required"=>trans("admin.the address is required"),
            "address.string"=>trans("admin.the address should be string"),
            "name.required"=>trans("admin.the name is required"),
            "name.string"=>trans("admin.the name should be string"),
            "aws_access_key.required"=>trans("admin.aws access key is required"),
            "aws_secret_access.required"=>trans("admin.aws secret access is required"),
            "aws_region.required"=>trans("admin.aws region is required"),
            "aws_bucket.required"=>trans("admin.aws bucket is required"),
            "domain.required"=>trans("admin.the domain is required"),
            "domain.url"=>trans("admin.the domain should be url"),



        ];


    }

}
