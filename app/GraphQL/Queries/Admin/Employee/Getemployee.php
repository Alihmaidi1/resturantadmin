<?php

namespace App\GraphQL\Queries\Admin\Employee;

use App\Models\employee;
use App\repo\interfaces\employeeinterface;

final class Getemployee
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

        return $this->employee->getEmployee($args["id"]);
    }
}
