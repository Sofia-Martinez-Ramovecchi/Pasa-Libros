<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ControllerValidateMessage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('welcome');
});

Route::get('password/request', [PasswordController::class, 'request'])->name('password.request');

Route::get('/publicaciones', function () {
    return view('IntercambioDeLibros');
});

Route::get('/misintercambios', function () {
    return view('MisIntercambios');
});

//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');

Route::get('/menulogueado', function () {
    return view('MenuLogueado');
});

Route::get('/mapa', function () {
    return view('mapa');
});

Route::get('/inicio', function () {
    return view('InicioPL');
})->name('inicio');

Route::get('/inicio#categorias', function () {
    return view('InicioPL');
})->name('categorias');

Route::post('/publicaciones', [ControllerValidateMessage::class, 'store'])->name('publicaciones.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'mostrar'])->name('perfil.mostrar');
    Route::patch('/perfil', [ProfileController::class, 'patch'])->name('perfil.patch');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
});

Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/auth/callback', function () {
    $googleUsuario = Socialite::driver('google')->user();

    // Buscar el usuario por email
    $usuario = Usuario::where('email', $googleUsuario->email)->first();

    if ($usuario) {
        // Si el usuario ya existe, actualizar los tokens de Google
        $usuario->update([
            'google_id' => $googleUsuario->id,
            'google_token' => $googleUsuario->token,
            'google_refresh_token' => $googleUsuario->refreshToken,
        ]);
    } else {
        // Si el usuario no existe, crear uno nuevo
        $usuario = Usuario::create([
            'google_id' => $googleUsuario->id,
            'nombre_usuario' => $googleUsuario->name,
            'email' => $googleUsuario->email,
            'google_token' => $googleUsuario->token,
            'google_refresh_token' => $googleUsuario->refreshToken,
            'password' => bcrypt(Str::random(16)),
        ]);
    }

    Auth::login($usuario);

    return redirect()->route('perfil.mostrar');
});



require __DIR__.'/auth.php';
