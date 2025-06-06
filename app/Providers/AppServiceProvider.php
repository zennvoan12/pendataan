<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
    public function boot(\Illuminate\Http\Request $request): void
    {
        if (!app()->environment('local')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
    }
}
