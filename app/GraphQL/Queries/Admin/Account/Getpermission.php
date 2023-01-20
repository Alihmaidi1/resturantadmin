<?php

namespace App\GraphQL\Queries\Admin\Account;

use App\Models\resturant;
use Illuminate\Support\Facades\Config;
use stdClass;

final class Getpermission
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $resturant = resturant::where("domain",request()->getHost())->count();
        $arr=($resturant>0)?config("global.permssion"):config("global.adminPermssion");
        $keys=[];
        $values=[];
        foreach($arr as $key=>$value){
            $keys[]=$key;
            $values[]=$value[Config::get('app.locale')];
        }
        $val=new stdClass();
        $val->key=$keys;
        $val->value=$values;
        return $val;


    }
}
