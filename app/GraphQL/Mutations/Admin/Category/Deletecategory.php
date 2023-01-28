<?php

namespace App\GraphQL\Mutations\Admin\Category;

use App\Models\category;
use App\repo\interfaces\categoryinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletecategory
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

        $category = $this->category->delete($args["id"]);
        return $category;


    }
}
