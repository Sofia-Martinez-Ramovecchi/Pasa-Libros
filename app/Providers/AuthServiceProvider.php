<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
/**
* The policy mappings for the application.
*
* @var array
*/
protected $policies = [
'App\Models\Publicacion' => 'App\Policies\UsuarioPolicy',
];

/**
* Register any authentication / authorization services.
*/
public function boot(): void
{
$this->registerPolicies();

// Aquí puedes definir Gates adicionales si es necesario
}
}


