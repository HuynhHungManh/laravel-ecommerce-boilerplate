<?php

namespace Arabia\Customer\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class CustomerServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/../routes.php';
        }
    }

    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
    }
}
