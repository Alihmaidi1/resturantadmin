<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use App\repo\interfaces\sliderinterface;
use Illuminate\Support\Facades\Storage;

final class Deleteslider
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

        $slider = $this->slider->delete($args["id"]);
        
        return $slider;
    }
}
