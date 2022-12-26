<?php

namespace App\GraphQL\Mutations\Admin\Tabletype;

use App\Models\tabletype;

final class Addtabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $tableType=tabletype::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "price"=>$args["price"],
            "currency_id"=>$args["currency_id"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $tableType->message=trans("admin.the table type was added successfully");
        return $tableType;

    }
}
