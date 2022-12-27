<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Exceptions\CustomException;
use App\Models\currency;
use App\repo\interfaces\currencyinterface;

final class Editcurrency
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

        $id=$args["id"];
        $name_en=$args["name_en"];
        $name_ar=$args["name_ar"];
        $code=$args["code"];
        $resturant_id=$args["resturant_id"];
        $is_default=$args["is_default"];
        $precent_value_in_dular=$args["precent_value_in_dular"];
        $currency=$this->currency->update($id, $code, $name_ar, $name_en, $precent_value_in_dular, $resturant_id, $is_default);
        $currency->message=trans("admin.the currency was updated successfully");
        return $currency;
    }
}
