<?php

namespace App\Providers;

use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use App\Services\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ProductResource::withoutWrapping();
        $this->app->bind(ProductServiceInterface::class,ProductService::class);
    }
}
