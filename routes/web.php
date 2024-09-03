<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\ServiceChatProfanity;
//IDEA: mejorar el return de los metodos, ver como crear un controller y rutearlo, ya que no respeta principio de responsabilidad unica
Route::get('post', function (Request $request, ServiceChatProfanity $service) {
    $message = $request->input('message', '');  // Obtiene el mensaje desde los parámetros de la solicitud
    $result = $service->isProfanity($message);

    return response()->json(['isProfanity' => $result]);
});


Route::get('/', function () {
    return view('welcome');
});


