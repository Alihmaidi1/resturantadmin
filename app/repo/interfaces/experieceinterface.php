<?php

namespace App\repo\interfaces;

interface experieceinterface{


    public function store($year,$benifit,$vacation);
    public function update($id,$year,$benifit,$vacation);
    public function delete($id);

}