<?php

namespace Kaizen\LaravelProStarter;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Kaizen\LaravelProStarter\Commands\InstallCommand;
use Kaizen\LaravelProStarter\Http\Middleware\RoleMiddleware;

class KaizenProStarterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/package/kaizen-pro-starter.php', 'kaizen-pro-starter');

        $this->commands([
            InstallCommand::class,
        ]);
    }

    public function boot(Router $router): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'kaizen-pro-starter');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $router->aliasMiddleware('kaizen.role', RoleMiddleware::class);

        $this->publishes([
            __DIR__.'/../config/package/kaizen-pro-starter.php' => config_path('kaizen-pro-starter.php'),
        ], 'kaizen-pro-starter-config');

        $this->publishes([
            __DIR__.'/../resources/views/auth' => resource_path('views/vendor/kaizen-pro-starter/auth'),
            __DIR__.'/../resources/views/components' => resource_path('views/vendor/kaizen-pro-starter/components'),
            __DIR__.'/../resources/views/dashboard' => resource_path('views/vendor/kaizen-pro-starter/dashboard'),
            __DIR__.'/../resources/views/layouts' => resource_path('views/vendor/kaizen-pro-starter/layouts'),
            __DIR__.'/../resources/views/partials' => resource_path('views/vendor/kaizen-pro-starter/partials'),
        ], 'kaizen-pro-starter-views');

        $this->publishes([
            __DIR__.'/../resources/dist' => public_path('vendor/kaizen/laravel-pro-starter'),
        ], 'kaizen-pro-starter-assets');
    }
}
