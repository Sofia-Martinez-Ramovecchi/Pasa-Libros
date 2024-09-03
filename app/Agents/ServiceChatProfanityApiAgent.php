<?php

namespace App\Agents;

use App\Contracts\ServiceChatProfanityApiAgentInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ServiceChatProfanityApiAgent implements ServiceChatProfanityApiAgentInterface
{
    /**
     * @throws ConnectionException
     */
    private static function makeRequest(string $text): string
{
    $response = Http::asForm()
        ->withoutVerifying() // Ignorar verificación de SSL
        ->post('https://api.sightengine.com/1.0/text/check.json', [
            'text' => $text, // Texto a moderar
            'lang' => 'es',  // Idioma en español
            'categories' => 'profanity,personal,link,drug,weapon,spam,content-trade,money-transaction,extremism,violence,self-harm,medical',
            'mode' => 'rules',
            'api_user' => env('SIGHTENGINE_API_USER'), // Define las variables en tu archivo .env
            'api_secret' => env('SIGHTENGINE_API_SECRET'),
        ]);
    //dd para testear respuesta entera de la api
    //dd($response->body());

return $response->body();
}

private static function parsedJSON(string $text): array
{
    return json_decode(self::makeRequest($text), true);
}

public static function checkForTextProfanity(string $message): bool
{
// Revisa si hay alguna coincidencia de insultos en la categoría de profanity
$response = self::parsedJSON($message);

// Verifica si hay algún resultado de coincidencia en la categoría 'profanity'
return !empty($response['profanity']['matches']);
}

public static function checkForFlagProfanity(string $message): array
{
// Obtiene las categorías marcadas por la API
$response = self::parsedJSON($message);

// Devolveremos un arreglo con todas las coincidencias en categorías relevantes
return [
'profanity' => $response['profanity']['matches'] ?? [],
'personal' => $response['personal']['matches'] ?? [],
'link' => $response['link']['matches'] ?? [],
// Agrega otras categorías si es necesario
];
}
}
