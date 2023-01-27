<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\storehouse;
use App\repo\interfaces\goodstoreinterface;

final class Editminquantity
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

        $goodstore_id=$args["id"];
        $min_quantity=$args["min_quantity"];
        $goodstore = $this->goodstore->editminquantity($goodstore_id, $min_quantity);
        $goodstore->message=trans("admin.min quantity was updated successfully");
        return $goodstore;

    }
}
