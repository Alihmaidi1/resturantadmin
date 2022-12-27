<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Models\admin;
use App\repo\interfaces\accountinterface;
final class Deleteadmin
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
        $admin = $this->account->deleteAdmin($args["id"]);
        $admin->message=trans("admin.the admin was deleted successfully");
        return $admin;

    }
}
