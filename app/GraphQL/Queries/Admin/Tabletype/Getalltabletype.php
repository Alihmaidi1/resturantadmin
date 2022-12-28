<?php

namespace App\GraphQL\Queries\Admin\Tabletype;

use App\Models\tabletype;
use App\repo\interfaces\tabletypeinterface;

final class Getalltabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $tabletype;
    public function __construct(tabletypeinterface $tabletype)
    {

        $this->tabletype=$tabletype;

    }
    public function __invoke($_, array $args)
    {

        return $this->tabletype->getAllTabletype($args["resturant_id"]);
    }
}
