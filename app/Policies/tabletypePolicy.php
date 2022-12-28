<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\role;
use App\Models\setting;
use App\Models\User;
use App\Models\tabletype;
use Illuminate\Auth\Access\HandlesAuthorization;

class tabletypePolicy
{
    use HandlesAuthorization;

    public $super;
    public function __construct()
    {

        $this->super = role::first()->id;
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

            return $this->deny(trans("admin.you should make setting for this resturant first"));
        }
        if($admin->role_id==$this->super){
            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to create tabletype"));
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

            return $this->deny(trans("admin.you should make setting for this resturant first"));
        }

        if($admin->role_id==$this->super){

            return true;
        }

        $tabletype=tabletype::find($injected["id"]);
        if($admin->resturant_id==$injected["resturant_id"]&& $admin->resturant_id==$tabletype->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to update tabletype"));

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

        if($admin->role_id==$this->super){

            return true;
        }
        $tabletype=tabletype::find($injected["id"]);
        if($admin->resturant_id==$tabletype->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to delete tabletype"));

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
