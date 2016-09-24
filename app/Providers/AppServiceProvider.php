<?php

namespace App\Providers;

use App\Contracts\EmailValidate;
use App\Contracts\Mailer;
use App\Services\Mailer\MailgunEmailService;
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
        $config = config('services.mailgun');
        $this->app->singleton(EmailValidate::class, function ($app) use ($config) {
            return new MailgunEmailValidateService(
                new Mailgun($config['key'])
            );
        });


        $this->app->singleton(Mailer::class, function ($app) {
            $config = config('services.jabisod');
            return new MailgunEmailService(
                new Mailgun($config['secret'])
            );
        });

    }
}
