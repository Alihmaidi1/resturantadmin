<?php

namespace App\Rules;

use App\Models\resturant;
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
        $resturant = resturant::where("domain",request()->getHost())->count();
        $permissions=($resturant>0)?config("global.permssion"):config("global.adminPermssion");
        $counter=0;
        foreach($value as $permission){
            foreach($permissions as $key=>$per){
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
