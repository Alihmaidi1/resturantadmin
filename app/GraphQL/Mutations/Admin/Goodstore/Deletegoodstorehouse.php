<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;
use App\repo\interfaces\goodstoreinterface;

final class Deletegoodstorehouse
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

        $goodstore=$this->goodstore->delete($args["id"]);
        $goodstore->message=trans("admin.the good was delete from this storehouse successfully");
        return $goodstore;

    }
}
