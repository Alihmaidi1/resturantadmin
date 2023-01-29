<?php


namespace App\repo\classes;

use App\Models\chat as ModelsChat;
use App\repo\interfaces\chatinterface;

class chat implements chatinterface{



    public function getChat(){


        return ModelsChat::all();

    }


}