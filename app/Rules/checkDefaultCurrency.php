<?php

namespace App\Rules;

use App\Models\currency;
use Illuminate\Contracts\Validation\Rule;

class checkDefaultCurrency implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $resturant_id;
    public $currency_id;
    public function __construct($resturant_id,$currency_id=null)
    {
        $this->currency_id = $currency_id;
        $this->resturant_id = $resturant_id;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if($this->currency_id==null){

        $count = currency::where("resturant_id",$this->resturant_id)->where("is_default_for_website",1)->count();

        }else{

        $count = currency::where("id","!=",$this->currency_id)->where("resturant_id",$this->resturant_id)->where("is_default_for_website",1)->count();


        }

        if($count>0){

            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans("admin.the resturant has already default currency");
    }
}
