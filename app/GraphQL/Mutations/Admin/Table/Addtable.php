<?php

namespace App\GraphQL\Mutations\Admin\Table;

use App\Models\table;
use App\repo\interfaces\tableinterface;

final class Addtable
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public $table;
    public function __construct(tableinterface $table)
    {
        $this->table = $table;
    }
    public function __invoke($_, array $args)
    {

    
        $name=$args["name"];
        $description_en=$args["description_en"];
        $description_ar=$args["description_ar"];
        $person_number=$args["person_number"];
        $status=$args["status"];
        $type_id=$args["type_id"];
        $table=$this->table->store($name,$description_en,$description_ar,$person_number,$status,$type_id);
        $table->message=trans("admin.the table was added successfully");
        return $table;


    }
}
