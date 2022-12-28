<?php

namespace App\repo\classes;

use App\Models\tabletype as ModelsTabletype;
use App\repo\interfaces\tabletypeinterface;


class tabletype implements tabletypeinterface{

    public function store($name_en,$name_ar,$price,$currency_id,$resturant_id){

        return ModelsTabletype::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "price"=>$price,
            "currency_id"=>$currency_id,
            "resturant_id"=>$resturant_id
        ]);



    }

    public function update($id,$name_en,$name_ar,$price,$currency_id,$resturant_id){


        $tabletype = ModelsTabletype::findOrFail($id);
        $tabletype->name = ["en" => $name_en, "ar" => $name_ar];
        $tabletype->price = $price;
        $tabletype->currency_id = $currency_id;
        $tabletype->resturant_id = $resturant_id;
        $tabletype->save();
        return $tabletype;

    }

    public function getAllTabletype($resturant_id){


        return ModelsTabletype::where("resturant_id",$resturant_id)->get();

    }
    public function delete($id){

        $tabletype=ModelsTabletype::findOrFail($id);
        $tabletype1=$tabletype;
        $tabletype->delete();
        return $tabletype1;



    }


}
