<?php

namespace App\Console\Commands;

use App\Contracts\EmailValidate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ValidateEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recipients:validate {limit=1000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validates emails against a mailgun email validate service';
    /**
     * @var EmailValidate
     */
    private $validate;

    /**
     * Create a new command instance.
     *
     * @param EmailValidate $validate
     */
    public function __construct(EmailValidate $validate)
    {
        parent::__construct();
        $this->validate = $validate;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = DB::table('recipients')->select('email')->where('valid', 0)->limit($this->argument('limit'))->get();
        $bar = $this->output->createProgressBar(count($data));
        $completed = 0;
        $failed = 0;

        #2 loop thru
        foreach ($data as $row):
            #3 validate email
            if ($this->validate->validate($row->email)->isValid()):
                #4 update db row
                DB::table('recipients')->where('email', $row->email)->update(['valid' => 1]);
                ++$completed;
            else:
                DB::table('recipients')->where('email', $row->email)->delete();
                ++$failed;
            endif;
            $bar->advance();
        endforeach;

        $bar->finish();

        $this->info( $completed ." Numbers of Rows are valid and " . $failed . " Numbers of rows are invalid and have been removed." );
    }
}
