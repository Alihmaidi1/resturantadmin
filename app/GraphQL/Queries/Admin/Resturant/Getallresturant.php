<?php

namespace App\GraphQL\Queries\Admin\Resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class Getallresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return  Cache::rememberForever('resturants', function () {
            return resturant::get();
        });


    }
}
