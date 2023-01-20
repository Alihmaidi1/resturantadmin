<?php

namespace App\GraphQL\Mutations\Admin\Table;

use App\Models\table;
use App\repo\interfaces\tableinterface;

final class Edittable
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $table;

     public  function __construct(tableinterface $table)
     {

        $this->table = $table;
    
     }
    public function __invoke($_, array $args)
    {

        $id=$args["id"];
        $name=$args["name"];
        $person_number=$args["person_number"];
        $description_en=$args["description_en"];
        $description_ar=$args["description_ar"];
        $status=$args["status"];
        $type_id=$args["type_id"];
        $table = $this->table->update($id,$name,$description_en,$description_ar,$person_number,$status,$type_id);
        $table->message=trans("admin.the table was updated successfully");
        return $table;

    }
}
