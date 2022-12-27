<?php

namespace App\repo\classes;

use App\Models\resturant as ModelsResturant;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;

class resturant implements resturantinterface{


    public function store($address,$name,$domain){


        return ModelsResturant::create([
            "address"=>$address,
            "name"=>$name,
            "domain"=>$domain
        ]);


    }

    public function update($id,$name,$address,$domain){


        $resturant = ModelsResturant::findOrFail($id);
        $resturant->name = $name;
        $resturant->address = $address;
        $resturant->domain = $domain;
        $resturant->save();
        return $resturant;



    }


    public function find($id){

        $resturant= Cache::rememberForever("resturant:".$id,function() use($id) {

            return ModelsResturant::findOrFail($id);
        });

        return $resturant;

    }


    public function getAllResturant(){


        return Cache::rememberForever('resturants', function () {
            return ModelsResturant::get();
        });




    }


    public function delete($id){
        $resturant=ModelsResturant::with("aws")->find($id);
        Cache::pull("resturant:".$resturant->id);
        Cache::pull("resturants");
        $resturant1=$resturant;
        $resturant->delete();
        return $resturant1;
    }



}
