<?php

use App\Http\Controllers\ControllerValidateMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\ServiceChatProfanity;
//IDEA: mejorar el return de los metodos, ver como crear un controller y rutearlo, ya que no respeta principio de responsabilidad unica
Route::resource('message',ControllerValidateMessage::class);


Route::get('/', function () {
    return view('welcome');
});


