<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        Paginator::useBootstrap();

        // custom if blade
            Blade::if('admin', function($user) {
                return $user->role->nama == 'Administrator' || $user->role->nama == 'Pokja';
            });
            Blade::if('isAdmin', function($user) {
                return $user->role->nama == 'Administrator';
            });
        // END custom if blade
    }
}
