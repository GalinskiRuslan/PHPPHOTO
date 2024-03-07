<?php

namespace App\Providers;

use App\Services\CalculateSumService;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class CalculateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CalculateSumService::class, function ($app){
            return new CalculateSumService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

    }
}
