<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Models\currency;
use App\repo\interfaces\currencyinterface;

final class Deletecurrency
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
        
        $currency1 = $this->currency->delete($args["id"]);
        $currency1->message=trans("admin.the currency was deleted successfully");
        return $currency1;

    }
}
