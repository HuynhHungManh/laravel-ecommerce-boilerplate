<?php

namespace Arabia\Shop\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Foundation\AliasLoader;
use Arabia\Shop\Facades\Cart;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
    }

    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades()
    {
        //to make the cart facade and bind the
        //alias to the class needed to be called.
        $loader = AliasLoader::getInstance();

        $loader->alias('cart', Cart::class);

        $this->app->singleton('cart', function () {
            return new cart();
        });

        $this->app->bind('cart', 'Arabia\Shop\Cart');
    }
}
