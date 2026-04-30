<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cliente;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('ver-cardapio', function (Cliente $cliente) {
            return $cliente->id;
        });
    }
}
