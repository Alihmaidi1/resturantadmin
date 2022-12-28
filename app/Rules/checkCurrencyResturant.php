<?php

namespace App\Rules;

use App\Models\currency;
use Illuminate\Contracts\Validation\Rule;

class checkCurrencyResturant implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $resturant_id;
    public $id;
    public function __construct($resturant_id)
    {
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


        $currency=currency::find($value);
        if($currency->resturant_id==$this->resturant_id){

            return true;

        }

        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans("admin.this currency is not exists in this resturant");
    }
}
