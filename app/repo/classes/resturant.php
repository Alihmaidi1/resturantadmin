<?php

namespace App\repo\classes;

use App\Models\resturant as ModelsResturant;
use App\repo\interfaces\resturantinterface;
use Illuminate\Support\Facades\Cache;

class resturant implements resturantinterface{


    public function store($name,$domain){


        return ModelsResturant::create([
            "name"=>$name,
            "domain"=>$domain,
            "database_name"=>"resturant".time()
        ]);


    }

    public function update($id,$name,$domain){


        $resturant = ModelsResturant::findOrFail($id);
        $resturant->name = $name;
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
