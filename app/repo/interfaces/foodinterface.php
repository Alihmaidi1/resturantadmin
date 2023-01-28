<?php

namespace App\repo\interfaces;

interface foodinterface{



    public function store($name_en,$name_ar,$thumbnail,$description_en,$description_ar,$tag,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_logo,$meta_keyword,$category_id,$currency_id,$price,$images);

    public function update($id,$name_en,$name_ar,$thumbnail,$description_en,$description_ar,$tag,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_logo,$meta_keyword,$category_id,$currency_id,$price,$images);

    public function delete($id);



    public function getFood($id);

}