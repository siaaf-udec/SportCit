<?php

namespace App\Container\SportCit\Src\Providers;

use App\Container\SportCit\Src\Repository\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class PlayerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Container\SportCit\Src\Interfaces\PlayerInterface', function($app)
        {
            return new PlayerRepository;
        });
    }
}