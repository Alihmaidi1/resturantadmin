<?php

namespace App\repo\interfaces;


interface goodinterface{


    public function store($name_en,$name_ar);
    public function update($id,$name_en,$name_ar);

    public function getAllGood();

    public function delete($id);

}
