<?php

namespace App\GraphQL\Validators\Admin\Role\Mutation;

use App\Models\role;
use App\Rules\checkPermission;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class EditroleValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "name_ar"=>["required"],
            "name_en"=>["required"],
            "permission"=>["array","required",new checkPermission],
            "id"=>["required","exists:roles,id",Rule::notIn(role::first()->id)],


        ];
    }


    public function messages(): array
    {
        return [


            "name_ar.required"=>trans("admin.name in arabic is required"),
            "name_en.required"=>trans("admin.name in english is required"),
            "permission.array"=>trans("admin.permission should be array"),
            "id.required"=>trans("admin.id field is required"),
            "id.not_in"=>trans("admin.can't edit super role"),
            "id.exists"=>trans("admin.id not found in our data"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")




        ];
    }

}
