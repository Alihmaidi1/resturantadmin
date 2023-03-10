<?php

namespace App\GraphQL\Validators\Admin\EmployeeExperience\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddexperieceValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "year"=>["required"],
            "benifit"=>["required"],
            "vacation"=>["required"],

        ];
    }


    public function messages(): array
    {
        return [

            "year.required"=>trans("admin.year is required"),
            "benifit.required"=>trans("admin.benifit is required"),
            "vacation.required"=>trans("admin.vacation is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")
        ];
    }


}
