<?php
namespace App\repo\interfaces;
interface categoryinterface{

    public function store($name_en,$name_ar,$logo,$description_en,$description_ar,$meta_description_en,$meta_description_ar,$meta_title_en,$meta_title_ar,$meta_logo,$keywords,$status,$images);
    public function update($id,$name_en,$name_ar,$logo,$description_en,$description_ar,$meta_description_en,$meta_description_ar,$meta_title_en,$meta_title_ar,$meta_logo,$keywords,$status,$images);

    public function delete($id);
    public function getCategory($id);

}