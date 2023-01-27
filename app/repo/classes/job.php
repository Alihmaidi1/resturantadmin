<?php

namespace App\repo\classes;

use App\Models\job as ModelsJob;
use App\repo\interfaces\jobinterface;

class job implements jobinterface{


    public function store($name_en,$name_ar,$salary,$currency_id){

        $job=ModelsJob::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "salary"=>$salary,
            "currency_id"=>$currency_id,
        ]);

        return $job;

    }

    public function update($id,$name_en,$name_ar,$salary,$currency_id){

        $job=ModelsJob::find($id);
        $job->name = ["en" => $name_en, "ar" => $name_ar];
        $job->salary = $salary;
        $job->currency_id = $currency_id;
        $job->save();
        return $job;

    }

    public function delete($id){

        $job = ModelsJob::find($id);
        $job1=$job;
        $job->delete();
        return $job1;
    }


}