<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\storehouse;
use App\repo\interfaces\goodstoreinterface;

final class Addgoodstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $goodstore;
     public function __construct(goodstoreinterface $goodstore)
     {
        $this->goodstore = $goodstore;
     }
    public function __invoke($_, array $args)
    {

        $quantity = $args["quantity"];
        $min_quantity = $args["min_quantity"];
        $good_id = $args["good_id"];
        $storehouse_id = $args["storehouse_id"];
        $goodstore = $this->goodstore->store($quantity, $min_quantity, $good_id, $storehouse_id);
        $goodstore->good = good::find($good_id);
        $goodstore->storehouse = storehouse::find($storehouse_id);
        
        return $goodstore;





        return null;
    }
}
