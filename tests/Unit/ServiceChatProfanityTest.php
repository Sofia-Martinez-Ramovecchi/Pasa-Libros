<?php

namespace Tests\Unit;

use App\Services\ServiceChatProfanity;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tests\FakeAgents\FakeServiceChatProfanityApiAgent;

describe('Test of Service Chat profanity', function () {
    it(/**
     * @throws BindingResolutionException
     */ 'service chat profanity should be defined', function () {
        $serviceChatProfanity = app()->makeWith(ServiceChatProfanity::class, [
            'agent' => new FakeServiceChatProfanityApiAgent()
        ]);
        expect($serviceChatProfanity)->toBeInstanceOf(ServiceChatProfanity::class);
    });

    it('service chat profanity should have method is profanity', function () {
        expect(ServiceChatProfanity::class)->toHaveMethod('isProfanity');
    });

    it(/**
     * @throws BindingResolutionException
     */ 'method is profanity should return bool', function () {
        $serviceChatProfanity = app()->makeWith(ServiceChatProfanity::class, [
            'agent' => new FakeServiceChatProfanityApiAgent()
        ]);
        $result = $serviceChatProfanity->isProfanity("hello how are you");
        expect($result)->toBeBool();
    });

    it(/**
     * @throws BindingResolutionException
     */ 'method is profanity should return true when the message is profanity', function () {
        $serviceChatProfanity = app()->makeWith(ServiceChatProfanity::class, [
            'agent' => new FakeServiceChatProfanityApiAgent()
        ]);
        $result = $serviceChatProfanity->isProfanity("hello how are you whore");
        expect($result)->toBeTrue();
    });

    it('service chat profanity should have method take flags', function () {
        expect(ServiceChatProfanity::class)->toHaveMethod('takeFlags');
    });

    it(/**
     * @throws BindingResolutionException
     */ 'method take flags should return string, it is flag', function () {
        $serviceChatProfanity = app()->makeWith(ServiceChatProfanity::class, [
            'agent' => new FakeServiceChatProfanityApiAgent()
        ]);
        $result = $serviceChatProfanity->takeFlags("hello how are you");
        expect($result)->toBeString();
    });

    it(/**
     * @throws BindingResolutionException
     */ 'method take flags should return a flag "x" when the message is a type of profanity', function () {
        $serviceChatProfanity = app()->makeWith(ServiceChatProfanity::class, [
            'agent' => new FakeServiceChatProfanityApiAgent()
        ]);
        $result = $serviceChatProfanity->takeFlags("hello how are you whore");
        expect($result)->toBe("flag");
    });
//TODO: ya podria empezar los test de funcionalidades como revisar si se envian datos privados, como por ejemplo informacion de tarjeta
    //TODO: comenzar servicios de publicacion y comentarios para integrar a este servicio
    //la api real ya fue testeada por medio de postman y de localhost en la web


});
