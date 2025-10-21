<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Gate;
=======
>>>>>>> Andar/Andar
use Illuminate\Support\ServiceProvider;

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
<<<<<<< HEAD
        Gate::define('admin-area', function ($user) {
            return $user->role === 'admin';
        });
=======
        //
>>>>>>> Andar/Andar
    }
}
