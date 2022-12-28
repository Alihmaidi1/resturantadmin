<?php

namespace App\GraphQL\Mutations\Admin\Tabletype;

use App\Models\tabletype;
use App\repo\interfaces\tabletypeinterface;

final class Addtabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $tabletype;
    public function __construct(tabletypeinterface $tabletype)
    {
        $this->tabletype = $tabletype;
    }
    public function __invoke($_, array $args)
    {

        $name_ar=$args["name_ar"];
        $name_en=$args["name_en"];
        $currency_id=$args["currency_id"];
        $price=$args["price"];
        $resturant_id=$args["resturant_id"];
        $tableType = $this->tabletype->store($name_en, $name_ar, $price, $currency_id, $resturant_id);
        $tableType->message=trans("admin.the table type was added successfully");
        return $tableType;

    }
}
