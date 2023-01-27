<?php

namespace App\GraphQL\Mutations\Admin\EmployeeExperience;

use App\Models\employee_experience;
use App\repo\interfaces\experieceinterface;

final class Editexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $experiece;

     public  function __construct(experieceinterface $experiece)
     {

        $this->experiece = $experiece;
        
     }
    public function __invoke($_, array $args)
    {

        $id=$args["id"];
        $year=$args["year"];
        $benifit=$args["benifit"];
        $vacation=$args["vacation"];
        $experiece = $this->experiece->update($id,$year,$benifit,$vacation);
        $experiece->message=trans("admin.the experiece was updated successfully");
        return $experiece;

    }
}
