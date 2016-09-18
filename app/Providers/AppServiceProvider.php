<?php

namespace App\Providers;

use App\Contracts\EmailValidate;
use App\Services\MailgunEmailValidateService;
use Illuminate\Support\ServiceProvider;
use Mailgun\Mailgun;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EmailValidate::class, function($app){
            $config = config('services.mailgun');
            return new MailgunEmailValidateService(
                new Mailgun($config['key'])
            );
        });
    }
}
