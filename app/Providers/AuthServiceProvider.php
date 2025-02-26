<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento das políticas para o aplicativo.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Registre os serviços de autenticação para o aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Aqui você pode registrar Gates ou permissões adicionais
        Gate::define('view-admin', function (User $user) {
            return $user->hasRole('admin');  // Por exemplo, checando role
        });
    }
}
