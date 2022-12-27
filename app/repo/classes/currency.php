<?php

namespace App\repo\classes;

use App\Models\currency as ModelsCurrency;
use App\repo\interfaces\currencyinterface;

class currency implements currencyinterface{

    public function store($code,$name_en,$name_ar,$precent_value_in_dular,$resturant_id,$is_default){


        return ModelsCurrency::create([
            "code"=>$code,
            "name"=>["ar"=>$name_ar,"en"=>$name_en],
            "precent_value_in_dular"=>$precent_value_in_dular,
            "resturant_id"=>$resturant_id,
            "is_default_for_website"=>$is_default
        ]);


    }

    public function update($id,$code,$name_ar,$name_en,$precent_value_in_dular,$resturant_id,$is_default){

        $currency = ModelsCurrency::findOrFail($id);
        $currency->code = $code;
        $currency->name = ["en"=>$name_en,"ar"=>$name_ar];
        $currency->precent_value_in_dular = $precent_value_in_dular;
        $currency->resturant_id = $resturant_id;
        $currency->is_default_for_website = $is_default;
        return $currency;

    }

    public function getAllCurrencyInResturant($resturant_id){

        return ModelsCurrency::where("resturant_id", $resturant_id)->get();

    }


    public function delete($id){

        $currency=ModelsCurrency::find($id);
        $currency1=$currency;
        $currency->delete();
        return $currency1;



    }


}
