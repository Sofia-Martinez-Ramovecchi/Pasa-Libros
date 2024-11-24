<?php

namespace App\Services;

use App\Contracts\ServiceChatProfanityApiAgentInterface;

class ServiceValidarOferta
{
    private ServiceChatProfanityApiAgentInterface $agent;


    public function __construct(ServiceChatProfanityApiAgentInterface $agent)
    {
        $this->agent = $agent;
    }

    public function isProfanity(string $message): bool
    {
        return $this->agent->checkForTextProfanity($message);
    }
    public function takeFlags(string $message)
    {
        return $this->agent->checkForFlagProfanity($message);
    }
}

