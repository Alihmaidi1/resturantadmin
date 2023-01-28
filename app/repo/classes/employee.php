<?php

namespace App\repo\classes;

use App\Models\employee as ModelsEmployee;
use App\repo\interfaces\employeeinterface;


class employee implements employeeinterface{


    public function store($name,$email,$phone,$address,$date_of_birth,$is_empty,$vacation_token,$gender,$manager_id,$job_id,$experience_id){

        $employee=ModelsEmployee::create([
            "name"=>$name,
            "email"=>$email,
            "phone"=>$phone,
            "address"=>$address,
            "date_of_birth"=>$date_of_birth,
            "is_empty"=>$is_empty,
            "vacation_token"=>$vacation_token,
            "gender"=>$gender,
            "manager_id"=>$manager_id,
            "job_id"=>$job_id,
            "experience_id"=>$experience_id
        ]);

        return $employee;

    }
    public function update($id,$name,$email,$phone,$address,$date_of_birth,$is_empty,$vacation_token,$gender,$manager_id,$job_id,$experience_id){


        $employee=ModelsEmployee::find($id);
        $employee->name=$name;
        $employee->email=$email;
        $employee->phone=$phone;
        $employee->address=$address;
        $employee->date_of_birth=$date_of_birth;
        $employee->is_empty=$is_empty;
        $employee->vacation_token=$vacation_token;
        $employee->gender=$gender;
        $employee->manager_id=$manager_id;
        $employee->job_id=$job_id;
        $employee->experience_id=$experience_id;
        $employee->save();
        $employee->message=trans("admin.the employee was updated successfully");
        return $employee;



    }

    public function delete($id){

        $employee=ModelsEmployee::find($id);
        $employee1=$employee;
        $employee->delete();
        $employee1->message=trans("admin.the employee was deleted successfully");
        return $employee1;

    }

    public function getEmployee($id){

        return ModelsEmployee::find($id);

    }


}