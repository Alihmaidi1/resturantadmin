<?php

namespace App\repo\classes;

use App\Models\slider as ModelsSlider;
use App\repo\interfaces\sliderinterface;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Execution\ModelsLoader\ModelsLoader;

class slider implements sliderinterface{



    public function store($logo, $status, $rank)
    {
        $name=saveimage("resturant:".config("global.resturant_id"),$logo,"slider");
        $slider=ModelsSlider::create([
            "logo"=>$name,
            "status"=>$status,
            "rank"=>$rank,
        ]);
        $slider->message=trans("admin.the slider was added successfully");

        return $slider;
    }

    public function update($id,$logo,$status,$rank){



        $slider=ModelsSlider::find($id);
        if($logo!=null){
            Storage::disk("resturant:".config("global.resturant_id"));
            $name=saveimage("resturant:".config("global.resturant_id"),$logo,"slider");
            $slider->logo=$name;
        }
        $slider->status=$status;
        $slider->rank=$rank;
        $slider->save();
        $slider->message=trans("admin.the slider was updated successfully");
        return $slider;


    }


    public function delete($id){


        $slider=ModelsSlider::find($id);
        Storage::disk("resturant:".config("global.resturant_id"))->delete($slider->getRawOriginal("logo"));
        $slider1=$slider;
        $slider1->message=trans("admin.the slider was deleted successfully");
        $slider->delete();
        return $slider1;


    }


}