<?php

use App\Http\Controllers\ControllerValidateMessage;
use Illuminate\Support\Facades\Route;

Route::get('/publicaciones', function () {
    return view('IntercambioDeLibros');
});

Route::post('/publicaciones', [ControllerValidateMessage::class, 'store'])->name('publicaciones.store');

Route::get('/', function () {
    return view('welcome');
});


