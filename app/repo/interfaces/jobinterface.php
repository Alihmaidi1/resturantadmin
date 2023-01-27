<?php

namespace App\repo\interfaces;
interface jobinterface{



    public function store($name_en,$name_ar,$salary,$currency_id);
    public function update($id,$name_en,$name_ar,$salary,$currency_id);

    public function delete($id);

}