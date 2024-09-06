<?php
namespace App\Http\Controllers;

use App\Services\ServiceChatProfanity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ControllerValidateMessage extends Controller{
    public function store(Request $message) : view
    {

        $messageContent = $message->input('message');
        $response = app(ServiceChatProfanity::class)->isProfanity($messageContent);
        return view('IntercambioDeLibros', ['response' => $response]);
    }


}

