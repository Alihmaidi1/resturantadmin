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
