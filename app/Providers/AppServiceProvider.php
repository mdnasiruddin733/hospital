<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        include(__DIR__."/../functions.php");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role=="admin";
        });

        Blade::if('doctor', function () {
            return auth()->check() && auth()->user()->role=="doctor";
        });

        Blade::if('patient', function () {
            return auth()->check() && auth()->user()->role=="patient";
        });
    }
}
