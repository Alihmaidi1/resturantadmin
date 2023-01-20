<?php

namespace App\repo\classes;

use App\Models\storehouse as ModelsStorehouse;
use App\repo\interfaces\storehouseinterface;

class storehouse implements storehouseinterface{


    public function store($name,$address,$isfull){


        return ModelsStorehouse::create([

            "name"=>$name,
            "address"=>$address,
            "isFull"=>$isfull,

        ]);



    }

    public function update($id,$name,$address,$isfull){

        $storehouse = ModelsStorehouse::findOrFail($id);
        $storehouse->name = $name;
        $storehouse->address = $address;
        $storehouse->isFull = $isfull;
        return $storehouse;

    }

    public function getAllStorehouse($resturant_id){


        return ModelsStorehouse::where("resturant_id",$resturant_id)->get();;


    }


    public function delete($id){

        $storehouse=ModelsStorehouse::findOrFail($id);
        $storehouse1=$storehouse;
        $storehouse->delete();
        return $storehouse1;


    }



}
