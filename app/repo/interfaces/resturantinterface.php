<?php

namespace App\repo\interfaces;


interface resturantinterface{


    public function store($address,$name,$domain);

    public function update($id,$name,$address,$domain);

    public function find($id);

    public function getAllResturant();

    public function delete($id);

}
