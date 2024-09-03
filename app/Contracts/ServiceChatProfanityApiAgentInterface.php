<?php

namespace App\Contracts;

interface ServiceChatProfanityApiAgentInterface
{
    static function checkForTextProfanity(string $message);
    static function checkForFlagProfanity(string $message);
}
