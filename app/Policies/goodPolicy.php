<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\good;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class goodPolicy
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
     * @param  \App\Models\good  $good
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin, array $injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to show good"));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to create good"));

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\good  $good
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {

        if($admin->role_id==$this->super){

            return true;
        }
        $good=good::find($injected["id"]);
        if($admin->resturant_id==$injected["resturant_id"]&&$admin->resturant_id==$good->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to update good"));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\good  $good
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {
        if($admin->role_id==$this->super){

            return true;
        }

        $good=good::find($injected["id"]);
        if($good->resturant_id==$admin->resturant_id){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to delete good"));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\good  $good
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, good $good)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\good  $good
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, good $good)
    {
        //
    }
}
