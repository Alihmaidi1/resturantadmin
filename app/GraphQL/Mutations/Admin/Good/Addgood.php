<?php

namespace App\GraphQL\Mutations\Admin\Good;

use App\Models\good;
use App\repo\interfaces\goodinterface;

final class Addgood
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

        $nane_en = $args["name_en"];
        $nane_ar = $args["name_ar"];
        $resturant_id = $args["resturant_id"];
        $good = $this->good->store($nane_en, $nane_ar, $resturant_id);
        $good->message=trans("admin.the good was added successfully");
        return $good;

    }
}
