<?php

namespace App\GraphQL\Validators\Admin\Category\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditcategoryValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "id"=>["required","exists:categories,id"],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "logo"=>["mimes:png,jpg,jpeg"],
            "description_en"=>["required"],
            "description_ar"=>["required"],
            "meta_title_en"=>["required"],
            "meta_title_ar"=>["required"],
            "meta_description_en"=>["required"],
            "meta_description_ar"=>["required"],
            "meta_logo"=>["mimes:png,jpg,jpeg"],
            "keywords"=>["required"],
            "status"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "name_en.required"=>trans("admin.name in english is required"),
            "name_ar.required"=>trans("admin.name in arabic is required"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "description_en.required"=>trans("admin.description in english is required"),
            "description_ar.required"=>trans("admin.description in arabic is required"),
            "meta_title_en.required"=>trans("admin.meta title in english is required"),
            "meta_title_ar.required"=>trans("admin.meta title in arabic is required"),
            "meta_description_en.required"=>trans("admin.meta description in english is required"),
            "meta_description_ar.required"=>trans("admin.meta description in arabic is required"),
            "meta_logo.mimes"=>trans("admin.meta logo should be image"),
            "keywords.required"=>trans("admin.keywords is required"),
            "status.required"=>trans("admin.status is required"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")

        ];
    }

}
