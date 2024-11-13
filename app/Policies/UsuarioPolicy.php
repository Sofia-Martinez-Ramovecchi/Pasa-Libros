<?php
namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given usuario can view their own profile.
     */
    public function viewProfile(Usuario $usuario, Usuario $profileUsuario): bool
    {
        return $usuario->id === $profileUsuario->id;
    }
}

