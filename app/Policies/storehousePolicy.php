<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\role;
use App\Models\User;
use App\Models\storehouse;
use Illuminate\Auth\Access\HandlesAuthorization;

class storehousePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public $super;

     public function __construct()
     {

        $this->super = role::first()->id;

     }

    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, storehouse $storehouse)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,$injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }
        return $this->deny(trans("admin.you don't have permmssion to create storehouse"));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }

        $storehouse=storehouse::find($injected["id"]);
        if($admin->resturant_id==$injected["resturant_id"]&&$admin->resturant_id==$storehouse->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to update storehouse"));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }
        $storehouse=storehouse::find($injected["id"]);
        if($admin->resturant_id==$storehouse->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to delete storehouses"));

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, storehouse $storehouse)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\storehouse  $storehouse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, storehouse $storehouse)
    {
        //
    }
}
