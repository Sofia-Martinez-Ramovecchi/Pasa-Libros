<?php

use App\Http\Controllers\ControllerValidateMessage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publicaciones', function () {
    return view('IntercambioDeLibros');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');


Route::get('/usuarioperfil', function () {
    return view('UsuarioPerfil');
});

Route::get('/menulogueado', function () {
    return view('MenuLogueado');
});
#IDEA: mapa esta vacio
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
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
});

Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // Buscar el usuario por email
    $user = User::where('email', $googleUser->email)->first();

    if ($user) {
        // Si el usuario ya existe, actualizar los tokens de Google
        $user->update([
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    } else {
        // Si el usuario no existe, crear uno nuevo
        $user = User::create([
            'google_id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
            'password' => bcrypt(Str::random(16)), // Genera una contraseña aleatoria
        ]);
    }

    Auth::login($user);

    return redirect()->route('perfil');
});



require __DIR__.'/auth.php';
