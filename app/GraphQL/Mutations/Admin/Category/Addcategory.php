<?php

namespace App\GraphQL\Mutations\Admin\Category;

use App\Models\category;
use App\Models\image;
use App\repo\interfaces\categoryinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Json;

final class Addcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $category;
    public function __construct(categoryinterface $category)
    {
        $this->category = $category;
    }
    public function __invoke($_, array $args)
    {
        
            $name_en=$args["name_en"];
            $name_ar=$args["name_ar"];
            $logo=$args["logo"];
            $description_en=$args["description_en"];
            $description_ar=$args["description_ar"];
            $meta_description_en=$args["meta_description_en"];
            $meta_description_ar=$args["meta_description_ar"];
            $meta_title_en=$args["meta_title_en"];
            $meta_title_ar=$args["meta_title_ar"];
            $meta_logo=$args["meta_logo"];
            $keywords=$args["keywords"];
            $status = $args["status"];
            $images=$args["images"];
            $category = $this->category->store($name_en, $name_ar, $logo, $description_en, $description_ar, $meta_description_en, $meta_description_ar, $meta_title_en, $meta_title_ar, $meta_logo, $keywords, $status, $images);
            return $category;
        }
}
