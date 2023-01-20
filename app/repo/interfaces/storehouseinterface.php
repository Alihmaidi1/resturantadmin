<?php

namespace App\repo\interfaces;


interface storehouseinterface{


    public function store($name,$address,$isfull);
    public function update($id,$name,$address,$isfull);

    public function getAllStorehouse($resturant_id);

    public function delete($id);

}
