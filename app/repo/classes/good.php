<?php

namespace App\repo\classes;

use App\Models\good as ModelsGood;
use App\repo\interfaces\goodinterface;

class good implements goodinterface{


    public function store($name_en,$name_ar,$resturant_id){


        return ModelsGood::create([

            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "resturant_id"=>$resturant_id
        ]);


    }

    public function update($id,$name_en,$name_ar,$resturant_id){


        $good=ModelsGood::findOrFail($id);
        $good->name=["en"=>$name_en,"ar"=>$name_ar];
        $good->resturant_id=$resturant_id;
        $good->save();
        return $good;


    }

    public function getAllGood($resturant_id){

        return ModelsGood::where("resturant_id",$resturant_id)->get();
    }


    public function delete($id){

        $good=ModelsGood::find($id);
        $good1=$good;
        $good->delete();
        return $good1;

    }



}
