<?php

namespace App\repo\classes;

use App\Models\role as ModelsRole;
use App\repo\interfaces\roleinterface;
class role implements roleinterface{


    public function store($name_ar,$name_en,$permission){


        return ModelsRole::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "permssions"=>json_encode($permission)
        ]);

    }

    public function delete($id){

        $role=ModelsRole::findOrFail($id);
        $role1=$role;
        $role->delete();
        return $role1;


    }

    public function update($id,$name_en,$name_ar,$permissions){

        $role = ModelsRole::findOrFail($id);
        $role->name = ["en" => $name_en, "ar" => $name_ar];
        $role->permssions = json_encode($permissions);
        $role->save();
        return $role;


    }

    public function getAllRole(){


        return ModelsRole::get();



    }



}
