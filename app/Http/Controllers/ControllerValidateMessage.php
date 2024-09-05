<?php

namespace App\Http\Controllers;

use App\Services\ServiceChatProfanity;
use Illuminate\Http\Request;

class ControllerValidateMessage extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $message)
    {
        $response = app(ServiceChatProfanity::class)->isProfanity($message);
        $flagResponse = app(ServiceChatProfanity::class)->takeFlags($message);

        // Convertir los arrays a cadenas JSON
        $response = json_encode($response);
        $flagResponse = json_encode($flagResponse);

        return view('IntercambioDeLibros', [
            'response' => $response,
            'flagResponse' => $flagResponse
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
