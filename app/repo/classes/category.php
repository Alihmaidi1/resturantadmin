<?php

namespace App\repo\classes;

use App\Models\category as ModelsCategory;
use App\Models\image;
use App\repo\interfaces\categoryinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class category implements categoryinterface{


    public function store($name_en, $name_ar, $logo, $description_en, $description_ar, $meta_description_en, $meta_description_ar, $meta_title_en, $meta_title_ar, $meta_logo, $keywords, $status, $images)
    {
        
        $logoname=saveimage("resturant:".config("global.resturant_id"),$logo,"category");
        $meta_logoname=saveimage("resturant:".config("global.resturant_id"),$meta_logo,"category");
        $category=ModelsCategory::create([
            "name"=>["en"=>$name_en,"ar"=>$name_ar],
            "logo"=>$logoname,
            "description"=>["en"=>$description_en,"ar"=>$description_ar],
            "meta_description"=>["en"=>$meta_description_en,"ar"=>$meta_description_ar],
            "meta_title"=>["en"=>$meta_title_en,"ar"=>$meta_title_ar],
            "meta_logo"=>$meta_logoname,
            "keywords"=>$keywords,
            "status"=>$status,
        ]);

        foreach($images as $image){
            $namee=saveimage("resturant:".config("global.resturant_id"),$image,"category");
            image::create([
                "url"=>$namee,
                "imageable_type"=>"app\Models\category",
                "imageable_id"=>$category->id,
            ]);

        }
        $category->message=trans("admin.the category was added successfully");
        Cache::put("category:".$category->id,$category);
        Cache::pull("categorys");
        return $category;


    }

    public function update($id,$name_en,$name_ar,$logo,$description_en,$description_ar,$meta_description_en,$meta_description_ar,$meta_title_en,$meta_title_ar,$meta_logo,$keywords,$status,$images){


        $category=ModelsCategory::find($id);
        if($logo!=null){
            Storage::disk("resturant:".config("global.resturant_id"))->delete($category->getRawOriginal("logo"));
            $logoname=saveimage("resturant:".config("global.resturant_id"),$logo,"category");
            
        }else{

            $logoname=$category->getRawOriginal("logo");
        }

        if($meta_logo!=null){
            Storage::disk("resturant:".config("global.resturant_id"))->delete($category->getRawOriginal("meta_logo"));
            $meta_logoname=saveimage("resturant:".config("global.resturant_id"),$meta_logo,"category");


        }else{
            $meta_logoname=$category->getRawOriginal("meta_logo");
        }
        if($images!=null){

            foreach($category->images as $image){

                Storage::disk("resturant:".config("global.resturant_id"))->delete($image->getRawOriginal("url"));
                $image->delete();

            }
            foreach($images as $image){
                $namee=saveimage("resturant:".config("global.resturant_id"),$image,"category");
                image::create([
                    "url"=>$namee,
                    "imageable_type"=>"app\Models\category",
                    "imageable_id"=>$category->id,
                ]);
            }
        }

        $category->name=["en"=>$name_en,"ar"=>$name_ar];
        $category->logo=$logoname;
        $category->description=["en"=>$description_en,"ar"=>$description_ar];
        $category->meta_description=["en"=>$meta_description_en,"ar"=>$meta_description_ar];
        $category->meta_title=["en"=>$meta_title_en,"ar"=>$meta_title_ar];
        $category->meta_logo=$meta_logoname;
        $category->keywords=$keywords;
        $category->status=$status;
        $category->save();

        Cache::rememberForever("category:".$category->id,function() use($category){

            return $category;

        });

        Cache::pull("categorys");
        $category->message=trans("admin.the category was updated successfully");
        return $category;



    }
    

    public function delete($id){

        $category=ModelsCategory::find($id);
        Cache::pull("category:".$category->id);
        Cache::pull("categorys");
        Storage::disk("resturant:".config("global.resturant_id"))->delete($category->getRawOriginal("logo"));
        Storage::disk("resturant:".config("global.resturant_id"))->delete($category->getRawOriginal("meta_logo"));
        foreach($category->images as $image){

            Storage::disk("resturant:".config("global.resturant_id"))->delete($image->getRawOriginal("url"));
        }
        $category1=$category;
        $category1->message=trans("admin.the category was deleted successfully");
        $category->delete();
        return $category1;





    }


    public function getCategory($id){

        return Cache::rememberForever("category:".$id,function()use($id){

            return ModelsCategory::find($id);
        });

    }


}
