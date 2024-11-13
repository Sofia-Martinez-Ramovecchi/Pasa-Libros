<?php

namespace App\Http\Controllers\Auth;
use Spatie\Permission\Models\Role;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController
{
/**
* Display the registration view.
*/
public function create(): View
{
return view('registro');
}

/**
* Handle an incoming registration request.
*
* @throws \Illuminate\Validation\ValidationException
*/
public function store(Request $request): RedirectResponse
{
$request->validate([
'name' => ['required', 'string', 'max:255'],
'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Usuario::class],
'password' => ['required', 'confirmed', Rules\Password::defaults()],
]);

$usuario = Usuario::create([
'email' => $request->email,
'password' => Hash::make($request->password),
'id_estado_cuenta' => 1, // Asignar estado de cuenta activo
'nombre_usuario' => $request->name,
]);

// Asignar rol 'usuario'
$usuario->assignRole('usuario');

event(new Registered($usuario));

Auth::login($usuario);

return redirect(route('dashboard', absolute: false));
}
}


