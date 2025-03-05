<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapa de políticas para o aplicativo.
     *
     * @var array
     */
    protected $policies = [
        // Registre suas políticas aqui, se necessário 
        User::class => UserPolicy::class,
    ];

    /**
     * Registre os serviços de autenticação do aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Aqui você pode definir gates de autenticação, caso necessário
        // Exemplo:
        // Gate::define('view-dashboard', function ($user) {
        //     return $user->hasRole('admin');
        // });
    }
}
