<?php

namespace App\GraphQL\Queries\Admin\Currency;

use App\repo\interfaces\currencyinterface;


final class Getallcurrency
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
        return $this->currency->getAllCurrencyInResturant();

    }
}
