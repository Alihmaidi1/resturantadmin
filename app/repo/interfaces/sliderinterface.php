<?php

namespace App\repo\interfaces;

interface sliderinterface{


    public function store($logo,$status,$rank);
    public function update($id,$logo,$status,$rank);

    public function delete($id);

}