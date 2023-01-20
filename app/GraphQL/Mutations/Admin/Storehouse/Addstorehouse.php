<?php

namespace App\GraphQL\Mutations\Admin\Storehouse;

use App\Models\storehouse;
use App\repo\interfaces\storehouseinterface;

final class Addstorehouse
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

            $name=$args["name"];
            $address=$args["address"];
            $isFull=$args["isFull"];
            $storehouse = $this->storehouse->store($name, $address, $isFull);
            $storehouse->message=trans("admin.the storehouse was added successfully");
            return $storehouse;

    }
}
