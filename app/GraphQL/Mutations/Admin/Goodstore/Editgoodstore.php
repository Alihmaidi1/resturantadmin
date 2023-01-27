<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;
use App\repo\interfaces\goodstoreinterface;

final class Editgoodstore
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $goodStore;
    public function __construct(goodstoreinterface $goodstore)
    {

        $this->goodStore = $goodstore;

    }
    public function __invoke($_, array $args)
    {

        $goodstore_id=$args["id"];
        $quantity=$args["quantity"];
        $goodstore = $this->goodStore->editquantity($goodstore_id, $quantity);
        $goodstore->message=trans("admin.the quantity of good was updated successfully in this storehouse");
        return $goodstore;
    }
}
