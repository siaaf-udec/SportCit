<?php

namespace App\Container\SportCit\Src\Providers;

use App\Container\SportCit\Src\Repository\TeamRepository;
use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Container\SportCit\Src\Interfaces\TeamInterface', function($app)
        {
            return new TeamRepository;
        });
    }
}