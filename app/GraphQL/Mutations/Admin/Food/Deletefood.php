<?php

namespace App\GraphQL\Mutations\Admin\Food;

use App\Models\food;
use App\repo\interfaces\foodinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletefood
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

        $id = $args["id"];
        $food = $this->food->delete($id);
        return $food;
        
    }
}
