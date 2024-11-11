<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function mostrar(Request $request): View{
        return view('Perfil',[
            'user'=>$request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
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

        // Actualizar el nombre de usuario
        if (!empty($validatedData['name'])) {
            $request->user()->name = $validatedData['name'];
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
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
