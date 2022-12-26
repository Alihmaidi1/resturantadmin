<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class rolePolicy
{
    use HandlesAuthorization;

    public $super;
    public function __construct()
    {

        $this->super=role::first();
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, role $role)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,array $injected)
    {

        if($admin->resturant_id==null){

            return true;
        }
        $resturant_id = isset($injected["resturant_id"]) ? $injected["resturant_id"] : null;
        if($admin->resturant_id==$resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to create role"));


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin,array $injected)
    {

        if($admin->resturant_id==null){

            return true;
        }
        $role = role::find($injected["id"]);
        $resturant_id=isset($injected["resturant_id"])?$injected["resturant_id"]:null;
        if($admin->resturant_id==$role->resturant_id&&$admin->resturant_id==$resturant_id){
            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to edit role"));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {

        if($admin->resturant_id==null){

            return true;
        }
        $role = role::find($injected["id"]);
        if($admin->resturant_id==$role->resturant_id){

            return true;
        }
        return $this->deny(trans("admin.you don't have permmssion to delete role"));



    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, role $role)
    {
        //
    }
}
