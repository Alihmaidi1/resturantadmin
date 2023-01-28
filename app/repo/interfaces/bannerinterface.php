<?php

namespace App\repo\interfaces;
interface bannerinterface{


    public function store($logo,$status,$rank,$url,$where_show);

    public function update($id,$logo,$status,$rank,$url,$where_show);

    public function delete($id);

    public function getBannerWhereShow($where_show);

}