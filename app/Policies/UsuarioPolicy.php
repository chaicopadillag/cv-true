<?php

namespace App\Policies;

use App\User;
use App\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function view(User $user, Usuario $usuario)
    {
        $response = Gate::inspect('ver-usuarios', $usuario);

        if ($response->allowed()) {
            return true;
        } else {
            echo $response->message();
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function update(User $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function delete(User $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function restore(User $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function forceDelete(User $user, Usuario $usuario)
    {
        //
    }
}
