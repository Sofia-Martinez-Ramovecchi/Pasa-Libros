<?php

namespace App\Policies;

use App\Models\PublicacionSolicitud;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class PublicacionSolicitudPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $user, PublicacionSolicitud $publicacionSolicitud): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $user, PublicacionSolicitud $publicacionSolicitud): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $user, PublicacionSolicitud $publicacionSolicitud): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $user, PublicacionSolicitud $publicacionSolicitud): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $user, PublicacionSolicitud $publicacionSolicitud): bool
    {
        //
    }
}
