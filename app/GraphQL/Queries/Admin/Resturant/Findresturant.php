<?php

namespace App\GraphQL\Queries\Admin\Resturant;

use App\Models\resturant;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;

final class Findresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $resturant;
    public function __construct(resturantinterface $resturant)
    {

        $this->resturant = $resturant;

    }
    public function __invoke($_, array $args)
    {
        $resturant = $this->resturant->find($args["id"]);
        $resturant->message=trans("admin.the data was fetched successfully");
        return $resturant;

    }
}
