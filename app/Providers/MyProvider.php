<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        dump('regist');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        dump('boot');
    }
}
