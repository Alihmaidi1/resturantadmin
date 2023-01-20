<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\resturant;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

final class Editresturant
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
        $id=$args["id"];
        $name=$args["name"];
        $domain=$args["domain"];
        $resturant=$this->resturant->update($id, $name, $domain);
        Cache::put("resturant:".$resturant->id,$resturant);
        Cache::pull("resturants");
        $resturant->message=trans("admin.the resturant was updated successfully");
        return $resturant;

    }
}
