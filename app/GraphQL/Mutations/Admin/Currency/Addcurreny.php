<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Exceptions\CustomException;
use App\Models\admin;
use App\Models\currency;
use App\repo\interfaces\currencyinterface;

final class Addcurreny
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $currency;
    public function __construct(currencyinterface $currency)
    {

        $this->currency = $currency;

    }
    public function __invoke($_, array $args)
    {

        $code = $args["code"];
        $name_en = $args["name_en"];
        $name_ar = $args["name_ar"];
        $precent_value_in_dular = $args["precent_value_in_dular"];
        $resturant_id = $args["resturant_id"];
        $is_default = $args["is_default"];
        $currency=$this->currency->store($code,$name_en,$name_ar,$precent_value_in_dular,$resturant_id,$is_default);
        $currency->message=trans("admin.the currency was created successfully");
        return $currency;

    }
}
