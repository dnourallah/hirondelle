<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() !== 'production') {
            $this->setDevelopment();
        }
    }

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
     * @return void
     */
    protected function setDevelopment()
    {
        // Set the default string length
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
