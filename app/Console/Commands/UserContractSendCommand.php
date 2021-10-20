<?php

namespace App\Console\Commands;

use App\Jobs\UserContractSendJob;
use App\Models\UserContract;
use Illuminate\Console\Command;

class UserContractSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contract:sign {userContractIds}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send User Contract To User for sign';

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
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');
        set_time_limit(0);

        $userContractIds = $this->argument('userContractIds');

        if (!is_array($userContractIds)) {
            $userContractIds = [$userContractIds];
        }

        $userContracts = UserContract::select("user_contract.id", "user_contract.is_send_mail", "user_contract.studio_id", "studio.name as studio_name", "user_contract.studio_id", "user_contract.is_sign", "users.name as user_name", "users.email")->whereIn("user_contract.id", $userContractIds)->where("user_contract.is_sign", "0")->leftJoin("users", "users.id", "user_contract.user_id")->leftJoin("studio", "studio.id", "user_contract.studio_id")->get();

        foreach ($userContracts as $key => $userContract) {
            if ($userContract->is_send_mail == "1") {
                UserContractSendJob::dispatch($userContract);
            }
        }

        return 0;
    }
}
