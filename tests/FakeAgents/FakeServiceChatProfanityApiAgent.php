<?php

namespace Tests\FakeAgents;

use App\Contracts\ServiceChatProfanityApiAgentInterface;
class FakeServiceChatProfanityApiAgent implements ServiceChatProfanityApiAgentInterface{
    static function checkForTextProfanity(string $message) : bool
    {
        return true;
    }

    static function checkForFlagProfanity(string $message): string
    {
        return "flag";
    }
}
