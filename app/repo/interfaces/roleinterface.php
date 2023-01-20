<?php

namespace App\repo\interfaces;


interface roleinterface{

    public function store($name_ar,$name_en,$permission);
    public function delete($id);
    public function update($id,$name_en,$name_ar,$permissions);

    public function getAllRole();


}
