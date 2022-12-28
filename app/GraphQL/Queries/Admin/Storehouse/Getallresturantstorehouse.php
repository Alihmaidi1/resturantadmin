<?php

namespace App\GraphQL\Queries\Admin\Storehouse;

use App\repo\interfaces\storehouseinterface;

final class Getallresturantstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

     public $storehouse;
    public function __construct(storehouseinterface $storehouse)
    {
        $this->storehouse=$storehouse;

    }
     public function __invoke($_, array $args)
    {

        return $this->storehouse->getAllStorehouse($args["resturant_id"]);


    }
}
