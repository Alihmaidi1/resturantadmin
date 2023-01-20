<?php

namespace App\repo\classes;

use App\Models\good as ModelsGood;
use App\repo\interfaces\goodinterface;

class good implements goodinterface{


    public function store($name_en,$name_ar){


        return ModelsGood::create([

            "name"=>["en"=>$name_en,"ar"=>$name_ar],
        ]);


    }

    public function update($id,$name_en,$name_ar){


        $good=ModelsGood::findOrFail($id);
        $good->name=["en"=>$name_en,"ar"=>$name_ar];
        $good->save();
        return $good;


    }

    public function getAllGood(){

        return ModelsGood::get();
    }


    public function delete($id){

        $good=ModelsGood::find($id);
        $good1=$good;
        $good->delete();
        return $good1;

    }



}
