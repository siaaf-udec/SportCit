<?php

namespace App\Container\SportCit\Src\Providers;

use App\Container\SportCit\Src\Repository\CategoryPlayerRepository;
use Illuminate\Support\ServiceProvider;

class CategoryPlayerServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Container\SportCit\Src\Interfaces\CategoryPlayerInterface', function ($app) {
            return new CategoryPlayerRepository;
        });
    }
}