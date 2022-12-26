<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\setting;
use App\Models\User;
use App\Models\tabletype;
use Illuminate\Auth\Access\HandlesAuthorization;

class tabletypePolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\tabletype  $tabletype
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, tabletype $tabletype)
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

        $count=setting::where("resturant_id",$injected["resturant_id"])->count();
        if($count==0){

            return false;
        }
        if($admin->role_id==1){
            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tabletype  $tabletype
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {


        $count=setting::where("resturant_id",$injected["resturant_id"])->count();
        if($count==0){

            return false;
        }

        if($admin->role_id==1){

            return true;
        }

        $tabletype=tabletype::find($injected["id"]);
        if($admin->resturant_id==$injected["resturant_id"]&& $admin->resturant_id==$tabletype->resturant_id){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tabletype  $tabletype
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {

        if($admin->role_id==1){

            return true;
        }
        $tabletype=tabletype::find($injected["id"]);
        if($admin->resturant_id==$tabletype->resturant_id){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tabletype  $tabletype
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, tabletype $tabletype)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tabletype  $tabletype
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, tabletype $tabletype)
    {
        //
    }
}
