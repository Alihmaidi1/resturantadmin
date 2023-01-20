<?php

namespace App\repo\classes;

use App\Models\admin;
use App\repo\interfaces\accountinterface;
use Illuminate\Support\Facades\Hash;

class account implements accountinterface{


    public function getAllAdmin(){

        $adminRank=auth("api")->user()->rank;
        $adminRole_id=auth("api")->user()->role_id;
        if($adminRole_id == 1){
            return admin::where("id","!=",auth()->user()->id)->get();
        }else{

            return admin::where("rank","<",$adminRank)->get();
        }


    }


    public function deleteAdmin($id)
    {

        $admin=admin::findOrFail($id);
        $admin1=$admin;
        $admin->delete();
        return $admin1;

    }

    public function find($id){

        return admin::findOrFail($id);
    }


    public function createAdmin($email,$password,$role_id,$rank,$name,$age,$gender){



        return admin::create([
            "email"=>$email,
            "password"=>Hash::make($password),
            "role_id"=>$role_id,
            "rank"=>$rank,
            "name"=>$name,
            "age"=>$age,
            "gender"=>$gender
        ]);


    }

    public function updateProfile($id,$email,$name,$age,$gender){

        $admin = admin::findOrFail($id);
        $admin->email = $email;
        $admin->name = $name;
        $admin->age = $age;
        $admin->gender = $gender;
        $admin->save();
        return $admin;

    }

    public function updateAdmin($id,$email,$role_id,$rank,$password,$name,$age,$gender){

        $admin = admin::findOrFail($id);
        $admin->email = $email;
        $admin->role_id = $role_id;
        $admin->rank = $rank;
        if($password!=null){
            $admin->password = Hash::make($password);
        }
        $admin->name = $name;
        $admin->age = $age;
        $admin->gender = $gender;
        $admin->save();
        return $admin;




    }


}
