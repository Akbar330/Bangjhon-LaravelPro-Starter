<?php

namespace Bangjhon\LaravelProStarter;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Bangjhon\LaravelProStarter\Commands\InstallCommand;
use Bangjhon\LaravelProStarter\Http\Middleware\RoleMiddleware;

class BangjhonProStarterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/package/bangjhon-pro-starter.php', 'bangjhon-pro-starter');

        $this->commands([
            InstallCommand::class,
        ]);
    }

  public function boot(Router $router): void
{
    if ($this->app->runningInConsole()) {
        $this->commands([
            InstallCommand::class,
        ]);
    }

    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'bangjhon-pro-starter');
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    $router->aliasMiddleware('bangjhon.role', RoleMiddleware::class);

    $this->publishes([
        __DIR__.'/../config/package/bangjhon-pro-starter.php' => config_path('bangjhon-pro-starter.php'),
    ], 'bangjhon-pro-starter-config');

    $this->publishes([
        __DIR__.'/../resources/views/auth' => resource_path('views/vendor/bangjhon-pro-starter/auth'),
        __DIR__.'/../resources/views/components' => resource_path('views/vendor/bangjhon-pro-starter/components'),
        __DIR__.'/../resources/views/dashboard' => resource_path('views/vendor/bangjhon-pro-starter/dashboard'),
        __DIR__.'/../resources/views/layouts' => resource_path('views/vendor/bangjhon-pro-starter/layouts'),
        __DIR__.'/../resources/views/partials' => resource_path('views/vendor/bangjhon-pro-starter/partials'),
    ], 'bangjhon-pro-starter-views');

    $this->publishes([
        __DIR__.'/../resources/dist' => public_path('vendor/bangjhon/laravel-pro-starter'),
    ], 'bangjhon-pro-starter-assets');
    }
}
