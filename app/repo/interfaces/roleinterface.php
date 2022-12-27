<?php

namespace App\repo\interfaces;


interface roleinterface{

    public function store($name_ar,$name_en,$permission,$resturant_id);
    public function delete($id);
    public function update($id,$name_en,$name_ar,$resturant_id,$permissions);

    public function getAllRole($resturant_id);


}
