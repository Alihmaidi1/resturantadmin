<?php

namespace App\GraphQL\Mutations\Admin\EmployeeExperience;

use App\Models\employee_experience;
use App\repo\interfaces\experieceinterface;

final class Deleteexperiece
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

        $experiece=$this->experiece->delete($args["id"]);
        $experiece->message=trans("admin.the experiece was deleted successfully");
        return $experiece;

    }
}
