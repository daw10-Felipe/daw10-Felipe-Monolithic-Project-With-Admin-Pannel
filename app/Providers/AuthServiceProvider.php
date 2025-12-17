<?php

namespace App\Providers;

use App\Models\Petition;
use App\Policies\PetitionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Petition::class => PetitionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // En Laravel 11, si usas este archivo manual, a veces necesitas esto:
        $this->registerPolicies();
    }
}
