<?php

namespace App\Console\Commands;

use App\SendSms;
use Illuminate\Console\Command;

class SendSMSCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sent:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send SMS';

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
     * @return int
     */
    public function handle()
    {
        $smsMessage = SendSms::get();

        foreach ($smsMessage as $key => $sms) {

        }

        return 0;
    }
}
