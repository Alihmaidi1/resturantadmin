<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkPermission implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $counter=0;
        foreach($value as $permission){
            foreach(config("global.permssion") as $key=>$per){
                if($key==$permission){

                    $counter++;
                }
            }
        }
        if($counter!=count($value)){

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
        return trans("admin.you have error value in permission");
    }
}
