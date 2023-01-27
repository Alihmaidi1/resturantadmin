<?php

namespace App\GraphQL\Mutations\Admin\Job;

use App\Models\job;
use App\repo\interfaces\jobinterface;

final class Editjob
{
    /**
     * @param  null  $_
     * @param  array{}  $args

     */

    public $job;
     public function __construct(jobinterface $job)
     {

        $this->job = $job;
     }

     public function __invoke($_, array $args)
    {


        $id=$args["id"];
        $name_en=$args["name_en"];
        $name_ar=$args["name_ar"];
        $salary=$args["salary"];
        $currency_id=$args["currency_id"];
        $job = $this->job->update($id, $name_en, $name_ar, $salary, $currency_id);
        $job->save();
        $job->message=trans("admin.the job was updated successully");
        return $job;


    }
}
