<?php

namespace App\GraphQL\Queries\Admin\Account;

use App\Models\admin;
use App\repo\interfaces\accountinterface;

final class Admininfo
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
        $admin=$this->account->find($args["id"]);
        $admin->message=trans("admin.the data was feteched successfully");
        return $admin;
    }
}
