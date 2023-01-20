<?php

namespace App\repo\interfaces;


interface tabletypeinterface{


    public function store($name_en,$name_ar,$price,$currency_id);
    public function update($id,$name_en,$name_ar,$price,$currency_id);
    public function getAllTabletype($resturant_id);

    public function delete($id);

}
