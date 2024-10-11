<?php

namespace App\Providers;

use App\Agents\ServiceChatProfanityApiAgent;
use App\Contracts\ServiceChatProfanityApiAgentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //para solucionar dependencia de service chat profanity api agent interface
        $this->app->bind(
            ServiceChatProfanityApiAgentInterface::class,
            ServiceChatProfanityApiAgent::class
        );



    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
