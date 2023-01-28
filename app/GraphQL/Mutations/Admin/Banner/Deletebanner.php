<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use App\repo\interfaces\bannerinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletebanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $banner;
    public function __construct(bannerinterface $banner)
    {

        $this->banner = $banner;
    }
    public function __invoke($_, array $args)
    {


        $banner = $this->banner->delete($args["id"]);
        return $banner;
    }
}
