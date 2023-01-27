<?php

namespace App\GraphQL\Mutations\Admin\Job;

use App\Models\job;
use App\repo\interfaces\jobinterface;

final class Deletejob
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
        $job=$this->job->delete($args["id"]);
        $job->message=trans("admin.the job was deleted successfully");
        return $job;


    }
}
