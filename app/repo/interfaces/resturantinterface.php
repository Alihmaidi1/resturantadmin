<?php

namespace App\repo\interfaces;


interface resturantinterface{


    public function store($name,$domain);

    public function update($id,$name,$domain);

    public function find($id);

    public function getAllResturant();

    public function delete($id);

}
