<?php

namespace App\repo\interfaces;

interface currencyinterface{


    public function store($code,$name_en,$name_ar,$precent_value_in_dular,$is_default);

    public function update($id,$code,$name_ar,$name_en,$precent_value_in_dular,$is_default);

    public function getAllCurrencyInResturant();

    public function delete($id);


}
