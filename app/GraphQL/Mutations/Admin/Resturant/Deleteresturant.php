<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\resturant;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

final class Deleteresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $resturant;
    public $aws;
    public function __construct(resturantinterface $resturant,cloudinterface $aws)
    {

        $this->resturant = $resturant;
        $this->aws = $aws;
    }
    public function __invoke($_, array $args)
    {
        $resturant1 = $this->resturant->delete($args["id"]);
        deletedisk("resturant:".$resturant1->id);
        $this->aws->deleteBucket($resturant1->aws->aws_bucket);
        $resturant1->message=trans("admin.the resturant was deleted successfully");
        return $resturant1;


    }
}
