<?php

namespace App\repo\classes;

use App\Models\employee_experience;
use App\repo\interfaces\experieceinterface;

class experiece implements experieceinterface{

    public function store($year,$benifit,$vacation){


        $experiece=employee_experience::create([

            "year"=>$year,
            "benifit"=>$benifit,
            "vacation"=>$vacation,

        ]);
        return $experiece;

    }

    public function update($id,$year,$benifit,$vacation){

        $experiece = employee_experience::find($id);
        $experiece->year = $year;
        $experiece->benifit = $benifit;
        $experiece->vacation = $vacation;
        $experiece->save();
        return $experiece;
    }

    public function delete($id){

        $experiece = employee_experience::find($id);
        $experiece1=$experiece;
        $experiece->delete();

        return $experiece1;
    }


}