<?php

namespace App\Rules;

use App\Models\currency;
use Illuminate\Contracts\Validation\Rule;

class deleteNotDefaultRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {



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


        $currency = currency::find($value);
        if($currency->is_default_for_website==1){

            return false;
        }else{

            return true;
        }

        

    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans("admin.you can't delete default currency");
    }
}
