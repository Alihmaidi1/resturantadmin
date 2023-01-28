<?php

namespace App\GraphQL\Mutations\Admin\Food;

use App\Models\food;
use App\Models\image;
use App\repo\interfaces\foodinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $food;
    public function __construct(foodinterface $food)
    {

        $this->food = $food;
    }
    public function __invoke($_, array $args)
    {

            $thumbnail=$args["thumbnail"];
            $name_en=$args["name_en"];
            $name_ar=$args["name_ar"];
            $description_en=$args["description_en"];
            $description_ar=$args["description_ar"];
            $tag=$args["tag"];
            $meta_title_en=$args["meta_title_en"];
            $meta_title_ar=$args["meta_title_ar"];
            $meta_description_en=$args["meta_description_en"];
            $meta_description_ar=$args["meta_description_ar"];
            $meta_logo=$args["meta_logo"];
            $meta_keyword=$args["meta_keyword"];
            $category_id=$args["category_id"];
            $currency_id=$args["currency_id"];
            $price=$args["price"];
            $images=$args["images"];
            $food=$this->food->store($name_en,$name_ar,$thumbnail,$description_en,$description_ar,$tag,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_logo,$meta_keyword,$category_id,$currency_id,$price,$images);
            return $food;

    }
}
