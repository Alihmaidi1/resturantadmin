<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class adminPolicy
{
    use HandlesAuthorization;

    public $superid;
    public function __construct()
    {

        $this->superid = role::first()->id;

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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin,array $injected)
    {
        $admin2=admin::find($injected["id"]);
        if($admin2->id==$admin->id){

            return true;
        }
        if($admin->role_id==$this->superid||$admin2->rank < $admin->rank){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to Show Admin"));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==$this->superid||$admin->rank > $injected["rank"]){
            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to create admin"));





    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {


        $admin2=admin::find($injected["id"]);

        if($admin2->id==$admin->id){

            return false;
        }


        if($admin->role_id==$this->superid){

            return true;
        }


        if($admin->rank > $admin2->rank && $admin->rank > $injected["rank"]){

            return true;
        }

        return $this->deny(trans("admin.you don't have permmssion to update admin"));




    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(admin $admin,array $injected)
    {

        $adminRank=$admin->rank;
        $admin1=admin::find($injected["id"]);
        if($admin->role_id==$this->superid||$adminRank>$admin1->rank){

            return true;
        }
        return $this->deny(trans("admin.you don't have permmssion to delete admin"));


    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
   }
