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
    public $currency_id;
    public $value;
    public function __construct($value,$currency_id=null)
    {
        $this->currency_id = $currency_id;
        $this->value = $value;
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


        if($this->currency_id==null&&$this->value==1){
 
                $count = currency::where("is_default_for_website",1)->count();
        }else{

            $count = 0;

        }

        if($this->currency_id!=null){

            $currency = currency::find($this->currency_id);
            if(($currency->is_default_for_website==0&&$this->value==1)||($currency->is_default_for_website==1&&$this->value==0)){

                $count = 1;
            }

        
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
        return trans("admin.the resturant has already default currency or you should not have default value");
    }
}
