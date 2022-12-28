<?php

namespace App\GraphQL\Mutations\Admin\Tabletype;

use App\Models\tabletype;
use App\repo\interfaces\tabletypeinterface;

final class Edittabletype
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

        $id=$args["id"];
        $name_en = $args["name_en"];
        $name_ar=$args["name_ar"];
        $price=$args["price"];
        $currency_id=$args["currency_id"];
        $resturant_id=$args["resturant_id"];
        $tabletype=$this->tabletype->update($id, $name_en, $name_ar, $price, $currency_id, $resturant_id);
        $tabletype->message=trans("admin.the table type was updated successfully");
        return $tabletype;

    }
}
