<?php

namespace App\GraphQL\Mutations\Admin\Good;

use App\Models\good;
use App\repo\interfaces\goodinterface;

final class Deletegood
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

        $good1 = $this->good->delete($args["id"]);
        $good1->message=trans("admin.the good was deleted successfully");
        return $good1;


    }
}
