<?php


namespace App\repo\interfaces;

interface tableinterface{


    public function store($name,$description_en,$description_ar,$person_number,$status,$type_id);
    public function update($id,$name,$description_en,$description_ar,$person_number,$status,$type_id);

}