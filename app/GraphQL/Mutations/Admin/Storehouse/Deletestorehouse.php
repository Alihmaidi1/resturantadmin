<?php

namespace App\GraphQL\Mutations\Admin\Storehouse;

use App\Models\storehouse;
use App\repo\interfaces\storehouseinterface;

final class Deletestorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $storehouse;

     public function __construct(storehouseinterface $storehouse)
     {

        $this->storehouse = $storehouse;

     }
    public function __invoke($_, array $args)
    {

        $storehouse1 = $this->storehouse->delete($args["id"]);
        $storehouse1->message=trans("admin.the storehouse was deleted successfully");
        return $storehouse1;


    }
}
