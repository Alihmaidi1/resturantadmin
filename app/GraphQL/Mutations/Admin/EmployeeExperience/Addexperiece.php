<?php

namespace App\GraphQL\Mutations\Admin\EmployeeExperience;

use App\Models\employee_experience;
use App\repo\interfaces\experieceinterface;

final class Addexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $experiece;
     public function __construct(experieceinterface $experiece)
     {

        $this->experiece = $experiece;

     }

     public function __invoke($_, array $args)
    {

        $year = $args["year"];
        $vacation = $args["vacation"];
        $benifit = $args["benifit"];
        $experiece = $this->experiece->store($year, $benifit, $vacation);
        $experiece->message=trans("admin.the experiece was added successfully");
        return $experiece;


    }
}
