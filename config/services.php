<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'key' => env('MAILGUN_PUBLIC_API_KEY'),
    ],

    'jabisod' =>[
        'domain' => env('JABISOD_MAILGUN_DOMAIN'),
        'secret' => env('JABISOD_MAILGUN_SECRET'),
        'key' => env('JABISOD_MAILGUN_KEY'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'pensms' => [
        'username' => env('PENSMS_USERNAME'),
        'password' => env('PENSMS_PASSWORD'),
    ],

];
