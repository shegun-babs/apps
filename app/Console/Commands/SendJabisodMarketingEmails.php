<?php

namespace App\Console\Commands;

use App\Contracts\Mailer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendJabisodMarketingEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:run {mailing_list_id} {limit=200}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process a list of running campaigns';

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
     * @param Mailer $mailer
     * @return mixed
     */
    public function handle(Mailer $mailer)
    {
        $mailing_list_id = $this->argument('mailing_list_id');
        $limit = $this->argument('limit');
        $domain = config('services.jabisod')['domain'];
        //get emails that have not been 'sent email'
        $emails = DB::select('SELECT email FROM recipients WHERE mailing_list_id = :id AND email NOT IN (SELECT email FROM emarketing_sent WHERE mailing_list_id = :list_id) LIMIT :limit',
            ['id' => $mailing_list_id, 'list_id' => $mailing_list_id, 'limit' => $limit]);

        $bar = $this->output->createProgressBar(count($emails));

        foreach ($emails as $row):
            $out = $mailer($domain)
                ->from("Jabisod Agencies <info@jabisodagencies.com>", "Home and Office Improvement Solutions")
                ->to($row->email, ['email' => encrypt($row->email), 'list_id' => encrypt($mailing_list_id)])
                ->send();

            if ($out->http_response_code == 200):
                //store in db
                DB::table('emarketing_sent')
                    ->insert([
                        'email' => $row->email,
                        'mailing_list_id' => $mailing_list_id,
                        'created_at' => Carbon::now(),
                    ]);
            endif;
            $bar->advance();
        endforeach;

        $bar->finish();

    }
}
