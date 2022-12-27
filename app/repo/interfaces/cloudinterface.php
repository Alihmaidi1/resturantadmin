<?php
namespace App\repo\interfaces;

interface cloudinterface{


    public function createBucket($resturant);
    public function deleteBucket($bucketName);
    public function makePublic($bucketName);
    public function store($bucketName,$resturant_id);

}
