<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    /**
     * Display the usuario's profile form.
     */
    public function mostrar(Request $request): View
    {
        $usuario = $request->user();

        // Verificar si el usuario puede ver su perfil
        Gate::authorize('viewProfile', $usuario);

        return view('Perfil', compact('usuario'));
    }
    /**
     * Update the usuario's profile information.
     */
    public function patch(ProfileUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Solo actualizar la contraseña si se proporciona
        if (!empty($validatedData['password'])) {
            $request->user()->password = bcrypt($validatedData['password']);
        }

        // Manejar la imagen de perfil si se proporciona
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_images', 'public');
            $validatedData['profile_photo'] = $path;
        }

        // Actualizar el nombre_usuario de usuario
        if (!empty($validatedData['nombre_usuario'])) {
            $request->user()->nombre_usuario = $validatedData['nombre_usuario'];
        }

        // Actualizar otros datos del usuario
        $request->user()->fill($validatedData);

        // Si el email ha cambiado, invalidar la verificación
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guardar los cambios en la base de datos
        $request->user()->save();

        // Redirigir con un mensaje de éxito
        return Redirect::route('perfil.mostrar')->with('status', 'success');
    }

    /**
     * Delete the usuario's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('usuarioDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $usuario = $request->user();

        Auth::logout();

        $usuario->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
