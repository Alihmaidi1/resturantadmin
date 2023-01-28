<?php

namespace App\repo\classes;

use App\Models\banner as ModelsBanner;
use App\repo\interfaces\bannerinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class banner implements bannerinterface{

    public function store($logo,$status,$rank,$url,$where_show){


        $name=saveimage("resturant:".config("global.resturant_id"),$logo,"banner");
        $banner=ModelsBanner::create([
            "logo"=>$name,
            "status"=>$status,
            "rank"=>$rank,
            "url"=>$url,
            "where_show"=>$where_show,
        ]);

        $banner->message=trans("admin.the banner was added successfully");
        Cache::pull("banners");
        Cache::put("banner:".$banner->id,$banner);
        return $banner;



    }


    public function update($id,$logo,$status,$rank,$url,$where_show){


        $banner=ModelsBanner::find($id);

        if($logo!=null){

            Storage::disk("resturant:".config("global.resturant_id"))->delete($banner->getRawOriginal("logo"));
            $path=saveimage("resturant:".config("global.resturant_id"),$logo,"banner");
            $banner->logo=$path;
        }
        $banner->status=$status;
        $banner->rank=$rank;
        $banner->url=$url;
        $banner->where_show=$where_show;
        $banner->save();
        Cache::pull("banners");
        Cache::put("banner:".$banner->id,$banner);
        $banner->message=trans("admin.the banner was updated successfully");
        return $banner;


    }


    public function delete($id){

        $banner=ModelsBanner::find($id);
        Storage::disk("resturant:".config("global.resturant_id"))->delete($banner->getRawOriginal("logo"));
        $banner1=$banner;
        $banner->delete();
        Cache::pull("banners");
        Cache::pull("banner:".$banner1->id);
        $banner1->message=trans("admin.the banner was deleted successfully");
        return $banner;
    


    }

    public function getBannerWhereShow($where_show)
    {
        

        $banners=ModelsBanner::where("where_show",$where_show)->get();
        
        return $banners;


    }

}