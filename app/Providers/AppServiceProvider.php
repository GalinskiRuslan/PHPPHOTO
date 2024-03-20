<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FacerImageProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //  Model::preventLazyLoading(!app()->isProduction());
        //  Model::preventSilentlyDiscardingAttributes(!app()->isProduction());

        //  DB::whenQueryingForLongerThan(1000, function (Connection $connection) {
        // logging
        //  });
    }
}
