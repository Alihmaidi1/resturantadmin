<?php

namespace App\GraphQL\Mutations\Admin\Good;

use App\Models\good;
use App\repo\interfaces\goodinterface;

final class Editgood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $good;
    public function __construct(goodinterface $good)
    {

        $this->good = $good;

    }
    public function __invoke($_, array $args)
    {

        $id=$args["id"];
        $name_en=$args["name_en"];
        $name_ar=$args["name_ar"];
        $resturant_id=$args["resturant_id"];
        $good = $this->good->update($id, $name_en, $name_ar, $resturant_id);
        $good->message=trans("admin.the good was updated successfully");
        return $good;

    }
}
