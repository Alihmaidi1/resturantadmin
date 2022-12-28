<?php

namespace App\repo\interfaces;


interface goodinterface{


    public function store($name_en,$name_ar,$resturant_id);
    public function update($id,$name_en,$name_ar,$resturant_id);

    public function getAllGood($resturant_id);

    public function delete($id);

}
