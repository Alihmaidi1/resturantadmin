<?php

namespace App\repo\classes;

use App\Models\food as ModelsFood;
use App\Models\image;
use App\repo\interfaces\foodinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class food implements foodinterface{

    public function store($name_en,$name_ar,$thumbnail,$description_en,$description_ar,$tag,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_logo,$meta_keyword,$category_id,$currency_id,$price,$images){


        $thumbnail_name=saveimage("resturant:".config("global.resturant_id"),$thumbnail,"food");
        $meta_logo_name=saveimage("resturant:".config("global.resturant_id"),$meta_logo,"food");

        $food=ModelsFood::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "thumbnail"=>$thumbnail_name,
            "description"=>["en"=>$description_en,"ar"=>$description_ar],
            "tag"=>$tag,
            "meta_title"=>["en"=>$meta_title_en,"ar"=>$meta_title_ar],
            "meta_description"=>["en"=>$meta_description_en,"ar"=>$meta_description_ar],
            "meta_logo"=>$meta_logo_name,
            "meta_keyword"=>$meta_keyword,
            "category_id"=>$category_id,
            "currency_id"=>$currency_id,
            "price"=>$price
        ]);

        foreach($images as $image){

            $namee=saveimage("resturant:".config("global.resturant_id"),$image,"food");
            image::create([

                "url"=>$namee,
                "imageable_type"=>"app\Models\\food",
                "imageable_id"=>$food->id,
            ]);

        }
        Cache::pull("foods");
        Cache::rememberForever("food:".$food->id,function() use($food){

            return $food;


        });
        $food->message=trans("admin.the food was added successfully");
        return $food;



        
    }

    public function update($id,$name_en,$name_ar,$thumbnail,$description_en,$description_ar,$tag,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_logo,$meta_keyword,$category_id,$currency_id,$price,$images){


        $food=ModelsFood::find($id);
        if($thumbnail!=null){

            Storage::disk("resturant:".config("global.resturant_id"))->delete($food->getRawOriginal("thumbnail"));
            $name_thumbnail=saveimage("resturant:".config("global.resturant_id"),$thumbnail,"food");
            $food->thumbnail=$name_thumbnail;


        }


        if($meta_logo!=null){

            Storage::disk("resturant:".config("global.resturant_id"))->delete($food->getRawOriginal("meta_logo"));
            $name_meta_logo=saveimage("resturant:".config("global.resturant_id"),$meta_logo,"food");
            $food->meta_logo=$name_meta_logo;

        }
        if($images!=null){

            foreach($food->images as $image){
                Storage::disk("resturant:".config("global.resturant_id"))->delete($image->getRawOriginal("url"));
                $image->delete();
            }
            foreach($images as $image){

                $namee=saveimage("resturant:".config("global.resturant_id"),$image,"food");
                image::create([
                    "url"=>$namee,
                    "imageable_type"=>"app\Models\\food",
                    "imageable_id"=>$food->id,
                ]);

            }

        }

        $food->name=["en"=>$name_en,"ar"=>$name_ar];
        $food->description=["en"=>$description_en,"ar"=>$description_ar];
        $food->tag=$tag;
        $food->meta_title=["en"=>$meta_title_en,"ar"=>$meta_title_ar];
        $food->meta_description=["en"=>$meta_description_en,"ar"=>$meta_description_ar];
        $food->meta_keyword=$meta_keyword;
        $food->category_id=$category_id;
        $food->price=$price;
        $food->currency_id=$currency_id;
        $food->save();
        Cache::pull("foods");
        Cache::rememberForever("food:".$food->id,function() use($food){

            return $food;


        });


        $food->message=trans("admin.the food was updated successfully");
        return $food;




    }

    public function delete($id){


        $food=ModelsFood::find($id);
        Cache::pull("foods");
        Cache::pull("food:".$food->id);
        Storage::disk("resturant:".config("global.resturant_id"))->delete($food->getRawOriginal("thumbnail"));
        Storage::disk("resturant:".config("global.resturant_id"))->delete($food->getRawOriginal("meta_logo"));
        foreach($food->images as $image){
            Storage::disk("resturant:".config("global.resturant_id"))->delete($image->getRawOriginal("url"));
        }
        $food->message=trans("admin.the food was deleted successfully");
        return $food;



    }

    public function getFood($id){


        return Cache::rememberForever("food:".$id,function()use($id){

            return ModelsFood::find($id);
        });


    }

}