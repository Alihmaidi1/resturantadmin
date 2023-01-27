<?php

namespace App\repo\interfaces;

interface goodstoreinterface{

    public function store($quantity,$min_quantity,$good_id,$storehouse_id);
    public function editminquantity($id,$min_quantity);
    public function editquantity($id,$quantity);

    public function delete($id);
    public function getallgoodinstorehouse($storehouse_id);

    
}