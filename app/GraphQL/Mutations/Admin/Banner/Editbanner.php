<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use App\repo\interfaces\bannerinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Editbanner
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

        $id=$args["id"];
        $status=$args["status"];
        $rank=$args["rank"];
        $url=$args["url"];
        $logo=$args["logo"];
        $where_show=$args["where_show"];
        $banner = $this->banner->update($id, $logo, $status, $rank, $url, $where_show);
        return $banner;

    }
}
