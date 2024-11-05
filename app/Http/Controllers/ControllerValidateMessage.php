<?php
namespace App\Http\Controllers;

use App\Http\Requests\ServiceChatRequest;
use Illuminate\Http\RedirectResponse;

class ControllerValidateMessage extends Controller{
    public function store(ServiceChatRequest $message): RedirectResponse
    {

        $validated = $message->validated();
        $validated = $message->safe()->only(['message']);
        return back()->withInput()->with('status','success');


    }


}

