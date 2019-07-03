<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Validation;

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
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $attributes) {
            return new Validation($translator, $data, $rules, $messages, $attributes);
        });        //
    }
}
