<?php

namespace App\GraphQL\Queries\Admin\Category;

use App\Models\category;
use App\repo\interfaces\categoryinterface;
use Illuminate\Support\Facades\Cache;

final class Getcategory
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

        return $this->category->getCategory($args["id"]);


    }
}
