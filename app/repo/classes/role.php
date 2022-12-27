<?php

namespace App\repo\classes;

use App\Models\role as ModelsRole;
use App\repo\interfaces\roleinterface;
class role implements roleinterface{


    public function store($name_ar,$name_en,$permission,$resturant_id){


        return ModelsRole::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "permssions"=>json_encode($permission),
            "resturant_id"=>$resturant_id
        ]);

    }

    public function delete($id){

        $role=ModelsRole::findOrFail($id);
        $role1=$role;
        $role->delete();
        return $role1;


    }

    public function update($id,$name_en,$name_ar,$resturant_id,$permissions){

        $role = ModelsRole::findOrFail($id);
        $role->name = ["en" => $name_en, "ar" => $name_ar];
        $role->resturant_id=$resturant_id;
        $role->permssions = json_encode($permissions);
        $role->save();
        return $role;


    }

    public function getAllRole($resturant_id){


        return ModelsRole::where("resturant_id", $resturant_id)->get();



    }



}
