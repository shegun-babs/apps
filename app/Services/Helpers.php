<?php

use App\Services\Notifier;

if (!function_exists('flash')) {

    function flash()
    {
        return app(Notifier::class);
    }

}