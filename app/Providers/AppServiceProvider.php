<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;

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
        if (
            $request->isSecure() ||
            $request->header('x-forwarded-proto') === 'https'
        ) {
            \Illuminate\Support\Facades\URL::forceScheme('https');

            // Keep APP_URL in sync with the forwarded host when served
            // through a reverse proxy (e.g., ngrok)
            config(['app.url' => $request->getSchemeAndHttpHost()]);
        }
            Paginator::useBootstrapFive();
            // Middleware should be registered in app/Http/Kernel.php, not here.
    }
}
