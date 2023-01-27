<?php

namespace App\repo\classes;

use App\Models\good;
use App\Models\goodstore as ModelsGoodstore;
use App\Models\storehouse;
use App\repo\interfaces\goodstoreinterface;

class goodstore implements goodstoreinterface{

    public function store($quantity,$min_quantity,$good_id,$storehouse_id){

        return ModelsGoodstore::create([
            "quantity"=>$quantity,
            "min_quantity"=>$min_quantity,
            "good_id"=>$good_id,
            "storehouse_id"=>$storehouse_id
        ]);



    }
    public function editminquantity($id,$min_quantity){

        $goodstore = ModelsGoodstore::find($id);
        $goodstore->min_quantity = $min_quantity;
        $goodstore->save();
        $goodstore->good = good::find($goodstore->good_id);
        $goodstore->storehouse = storehouse::find($goodstore->storehouse_id);
        return $goodstore;

    }


    public function editquantity($id, $quantity)
    {
        
        $goodstore = ModelsGoodstore::find($id);
        $goodstore->quantity = $quantity;
        $goodstore->save();
        $goodstore->good = good::find($goodstore->good_id);
        $goodstore->storehouse = storehouse::find($goodstore->storehouse_id);
        return $goodstore;


    }

    public function delete($id){

        $goodstore = ModelsGoodstore::find($id);
        $goodstore1 = $goodstore;
        $goodstore->delete();
        return $goodstore1;
    }

    public function getallgoodinstorehouse($storehouse_id){

        $goodstores=ModelsGoodstore::where("storehouse_id",$storehouse_id)->get();
        $arr=[];
        foreach($goodstores as $goodstore){

            $goodstore->good=good::find($goodstore->good_id);
            $arr[]=$goodstore;
        }

        return $arr;


    }


}