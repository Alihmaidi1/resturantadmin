<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Jobs\createResturantJob;
use App\Models\aws;
use App\Models\resturant;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
        $name = $args["name"];
        $domain = $args["domain"];
        $resturant = $this->resturant->store($name, $domain);
        $bucketName=$this->aws->createBucket($resturant);
        $this->aws->makePublic($bucketName);
        $this->aws->store($bucketName, $resturant->id);
        DB::statement("create database " . $resturant->database_name);
        $job = new createResturantJob($resturant);
        dispatch($job);
        Cache::put("resturant:".$resturant->id,$resturant);
        Cache::pull("resturants");
        $resturant->message=trans("admin.the resturant was created successfully");
        return $resturant;


    }
}
