<?php

namespace App\repo\interfaces;

interface employeeinterface{


    public function store($name,$email,$phone,$address,$date_of_birth,$is_empty,$vacation_token,$gender,$manager_id,$job_id,$experience_id);
    public function update($id,$name,$email,$phone,$address,$date_of_birth,$is_empty,$vacation_token,$gender,$manager_id,$job_id,$experience_id);

    public function delete($id);

    public function getEmployee($id);
}