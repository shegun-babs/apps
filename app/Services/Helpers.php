<?php

use App\Services\Notifier;
use Illuminate\Support\Collection;

if (!function_exists('flash')) {

    function flash()
    {
        return app(Notifier::class);
    }
}


function make_r_variables(Collection $rec, $data='email')
{
    $emails = $rec->implode('email', ", ");
    $r = [];

    foreach ($rec as $row)
    {
        $r[$row->email] = ["$data" => $row->email];
    }
    return (Object)['data'=>json_encode($r), 'emails'=>$emails];
}