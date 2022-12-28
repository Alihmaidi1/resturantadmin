<?php

namespace App\GraphQL\Mutations\Admin\Tabletype;

use App\Models\tabletype;
use App\repo\interfaces\tabletypeinterface;

final class Deletetabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $tabletype;
    public function __construct(tabletypeinterface $tabletype)
    {

        $this->tabletype = $tabletype;

    }
    public function __invoke($_, array $args)
    {
        $tabletype1 = $this->tabletype->delete($args["id"]);
        $tabletype1->message=trans("admin.the table type was deleted successfully");
        return $tabletype1;

    }

}
