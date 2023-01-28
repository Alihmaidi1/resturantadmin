<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use App\repo\interfaces\sliderinterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $slider;

     public function __construct(sliderinterface $slider)
     {
        $this->slider = $slider;
     }
    public function __invoke($_, array $args)
    {

        $logo=$args["logo"];
        $status=$args["status"];
        $rank=$args["rank"];
        $slider = $this->slider->store($logo, $status, $rank);
        return $slider;
        }
}
