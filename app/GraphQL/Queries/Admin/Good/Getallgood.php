<?php

namespace App\GraphQL\Queries\Admin\Good;

use App\Models\good;
use App\repo\interfaces\goodinterface;

final class Getallgood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $good;
    public function __construct(goodinterface $good)
    {
        $this->good=$good;
    }
    public function __invoke($_, array $args)
    {

        return $this->good->getAllGood($args["resturant_id"]);

    }
}
