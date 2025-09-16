<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->routes(function (Router $router) {
            // API routes
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
