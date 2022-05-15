<?php

namespace App\Providers;

use App\View\Components\categorydropdown;
use App\View\Components\postcomment;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('categorydropdown', categorydropdown::class);
        Blade::component('postcomment', postcomment::class);

    }
}
