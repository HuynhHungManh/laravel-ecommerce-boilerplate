<?php

namespace Arabia\Category\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/../routes.php';
        }

        $this->app->make(EloquentFactory::class)->load(__DIR__ . '/../Database/Factories');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
