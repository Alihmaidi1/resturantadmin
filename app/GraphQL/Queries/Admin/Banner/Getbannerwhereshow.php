<?php

namespace App\GraphQL\Queries\Admin\Banner;

use App\Models\banner;
use App\Models\resturant;
use App\repo\interfaces\bannerinterface;
use Illuminate\Support\Facades\Cache;

final class Getbannerwhereshow
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
        $where_show = $args["where_show"];
        $banners = $this->banner->getBannerWhereShow($where_show);
        return $banners;
    }
}
