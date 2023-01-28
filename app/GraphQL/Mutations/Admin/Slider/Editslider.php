<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use App\repo\interfaces\sliderinterface;
use Illuminate\Support\Facades\Storage;

final class Editslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

     public $slider;
     public function __construct(sliderinterface $slider)
     {
        $this->slider=$slider;
     }
    public function __invoke($_, array $args)
    {

        $id=$args["id"];
        $logo = $args["logo"];
        $status=$args["status"];
        $rank=$args["rank"];
        $slider = $this->slider->update($id, $logo, $status, $rank);
        return $slider;

    }
}
