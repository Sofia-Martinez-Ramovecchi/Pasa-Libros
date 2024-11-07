<?php

use App\Http\Controllers\ControllerValidateMessage;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\AdministradorController; 
use Illuminate\Support\Facades\Route;


Route::get('/usuarios', [AdministradorController::class, 'index']);
Route::get('/usuarios/create', [AdministradorController::class, 'create']);
Route::delete('/usuarios/{usuario}', [AdministradorController::class, 'destroy'])->name('usuarios.destroy');


Route::post('/publicaciones', [ControllerValidateMessage::class, 'store'])->name('publicaciones.store');

Route::get('/', function () {
    return view('welcome');
});



#Auth::routes();

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
