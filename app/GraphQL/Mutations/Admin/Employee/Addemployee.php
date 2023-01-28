<?php

namespace App\GraphQL\Mutations\Admin\Employee;

use App\Models\employee;
use App\repo\interfaces\employeeinterface;

final class Addemployee
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

            $name=$args["name"];
            $email=$args["email"];
            $phone=$args["phone"];
            $address=$args["address"];
            $date_of_birth=$args["date_of_birth"];
            $is_empty=$args["is_empty"];
            $vacation_token=$args["vacation_token"];
            $gender=$args["gender"];
            $manager_id=$args["manager_id"];
            $job_id=$args["job_id"];
            $experience_id=$args["experience_id"];
            $employee = $this->employee->store($name, $email, $phone, $address, $date_of_birth, $is_empty, $vacation_token, $gender, $manager_id, $job_id, $experience_id); 
            $employee->message=trans("admin.the employee was added successfully");

        return $employee;

    }
}
