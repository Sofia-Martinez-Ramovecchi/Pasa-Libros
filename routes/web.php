<?php

use App\Http\Controllers\ControllerValidateMessage;
use App\Http\Controllers\ProfileController;
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

Route::post('/publicaciones', [ControllerValidateMessage::class, 'store'])->name('publicaciones.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

    return redirect()->route('profile.edit');
});



require __DIR__.'/auth.php';
