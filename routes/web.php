<?php

use App\Http\Controllers\ControllerValidateMessage;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\AdministradorController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/usuarios', [AdministradorController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [AdministradorController::class, 'create']);
Route::delete('/usuarios/{usuario}', [AdministradorController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{usuario}/edit', [AdministradorController::class, 'edit'])->name('usuarios.edit');
Route::patch('/usuarios/{usuario}', [AdministradorController::class, 'update'])->name('usuarios.update');


Route::post('/publicaciones', [ControllerValidateMessage::class, 'store'])->name('publicaciones.store');

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['register'=>false, 'login'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
