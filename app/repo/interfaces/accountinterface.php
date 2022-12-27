<?php


namespace App\repo\interfaces;

interface accountinterface{


    public function getAllAdmin();
    public function deleteAdmin($id);
    public function find($id);

    public function createAdmin($email,$password,$role_id,$rank,$name,$age,$resturant_id,$gender);

    public function updateProfile($id,$email,$name,$age,$gender);
    public function updateAdmin($id,$email,$role_id,$resturant_id,$rank,$password,$name,$age,$gender);


}
