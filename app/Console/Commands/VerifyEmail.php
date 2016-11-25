<?php

namespace App\Console\Commands;

use Httpful\Request;
use Illuminate\Console\Command;

class VerifyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:validate {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validate if a Email address exists from an API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $email = $this->argument('email');
        $data = 'https://ajith-Verify-email-address-v1.p.mashape.com/varifyEmail?' . $email;
        $data = urlencode($data);
        $out = $request->get($data)->addHeaders([
            'X-Mashape-Key' => 'eKoRLl41IjmshR0xpB0jSL9bX5wMp1o8QnejsnbEhkV5CfPmK2',
            'Accept' => 'application/json'
        ])->send();
        dd($out);
    }
}
