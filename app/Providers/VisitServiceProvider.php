<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class VisitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('sections/nav','App\Http\ViewComposers\VisitComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
