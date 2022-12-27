<?php

namespace App\GraphQL\Queries\Admin\Account;

use App\Models\admin;
use App\repo\interfaces\accountinterface;

final class Getalladmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

     public $account;
     public function __construct(accountinterface $account)
     {

        $this->account = $account;

     }
    public function __invoke($_, array $args)
    {

        return $this->account->getAllAdmin();

    }
}
