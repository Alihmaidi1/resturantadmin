<?php

namespace App\repo\classes;

use App\Models\table as ModelsTable;
use App\repo\interfaces\tableinterface;

class table implements tableinterface{


    public function store($name, $description_en, $description_ar, $person_number, $status, $type_id)
    {
        

        return  ModelsTable::create([

            "name"=>$name,
            "description"=>["en"=>$description_en,"ar"=>$description_ar],
            "person_number"=>$person_number,
            "status"=>$status,
            "type_id"=>$type_id
        ]);


    }

    public function update($id, $name, $description_en, $description_ar, $person_number, $status, $type_id)
    {

        $table = ModelsTable::find($id);
        $table->update([

            "id"=>$id,
            "name"=>$name,
            "description"=>["en"=>$description_en,"ar"=>$description_ar],
            "person_number"=>$person_number,
            "status"=>$status,
            "type_id"=>$type_id

        ]);

        return $table;

    }
}