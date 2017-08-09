<?php

namespace App\Container\SportCit\Src\Providers;

use App\Container\SportCit\Src\Repository\OrganizationRepository;
use Illuminate\Support\ServiceProvider;

class OrganizationServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Container\SportCit\Src\Interfaces\OrganizationInterface', function($app)
        {
            return new OrganizationRepository;
        });
    }
}