<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\View\Components\categorydropdown;
use App\View\Components\postcomment;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = new ApiClient;

            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us9'
            ]);

            return new MailchimpNewsletter($client);
        });
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
