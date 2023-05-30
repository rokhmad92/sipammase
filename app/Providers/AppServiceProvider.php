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
                return $user->role_id == 1 || $user->role_id == 2;
            });
            Blade::if('isAdmin', function($user) {
                return $user->role_id == 1;
            });
        // END custom if blade
    }
}
