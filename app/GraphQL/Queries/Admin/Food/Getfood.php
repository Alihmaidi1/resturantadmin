<?php

namespace App\GraphQL\Queries\Admin\Food;

use App\Models\food;
use App\repo\interfaces\foodinterface;
use Illuminate\Support\Facades\Cache;

final class Getfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $food;
    public function __construct(foodinterface $food)
    {

        $this->food = $food;
        

    }
    public function __invoke($_, array $args)
    {

        return $this->food->getFood($args["id"]);

    }
}
