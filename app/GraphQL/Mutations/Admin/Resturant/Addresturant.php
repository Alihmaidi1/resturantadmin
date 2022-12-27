<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\aws;
use App\Models\resturant;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Aws\Exception\AwsException;
final class Addresturant
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
        $address = $args["address"];
        $name = $args["name"];
        $domain = $args["domain"];
        $resturant = $this->resturant->store($address, $name, $domain);
        $bucketName=$this->aws->createBucket($resturant);
        $this->aws->makePublic($bucketName);
        $this->aws->store($bucketName, $resturant->id);
        Cache::put("resturant:".$resturant->id,$resturant);
        Cache::pull("resturants");
        $resturant->message=trans("admin.the resturant was created successfully");
        return $resturant;


    }
}
