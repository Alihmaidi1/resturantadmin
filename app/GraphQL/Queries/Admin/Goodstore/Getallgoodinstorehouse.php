<?php

namespace App\GraphQL\Queries\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;
use App\Models\storehouse;
use App\repo\interfaces\goodstoreinterface;

final class Getallgoodinstorehouse
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

        return $this->goodstore->getallgoodinstorehouse($args["storehouse_id"]);
    }
}
