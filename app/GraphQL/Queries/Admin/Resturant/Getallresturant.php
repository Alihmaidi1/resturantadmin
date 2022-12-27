<?php

namespace App\GraphQL\Queries\Admin\Resturant;

use App\Models\resturant;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;

final class Getallresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $resturant;
    public function __construct(resturantinterface $resturant)
    {

        $this->resturant=$resturant;

    }
    public function __invoke($_, array $args)
    {
        return $this->resturant->getAllResturant();


    }
}
