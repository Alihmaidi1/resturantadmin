<?php

namespace App\GraphQL\Mutations\Admin\Employee;

use App\Models\employee;
use App\repo\interfaces\employeeinterface;

final class Deleteemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $employee;
    public function __construct(employeeinterface $employee)
    {
        $this->employee = $employee;
    }
    public function __invoke($_, array $args)
    {

        $employee=$this->employee->delete($args["id"]);
        return $employee;

    }
}
