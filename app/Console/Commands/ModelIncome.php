<?php

namespace App\Console\Commands;

use App\Models\Income;
use App\Models\TourHour;
use Illuminate\Console\Command;

class ModelIncome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:income {modelId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate Online Tour Model Income';

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
     * @return mixed
     */
    public function handle()
    {
        $date = date("Y-m-d");

        $modelId = $this->argument('modelId');

        $tourHours = TourHour::where("user_role", "model")->where("date", date("Y-m-d"))->whereNotNull("tour_id")->whereNotNull("working_start_time")->where('finish_time', null);

        if (!empty($modelId)) {
            $tourHours = $tourHours->where("user_id", $modelId);
        }

        $tourHours = $tourHours->get();

        if ($tourHours) {
            foreach ($tourHours as $key => $tourHour) {
                $modelId = $tourHour->user_id;
                $tourId  = $tourHour->tour_id;

                $videoSites = getActiveVideoSiteById($modelId);
                if (count($videoSites) > 0) {
                    foreach ($videoSites as $key1 => $videoSite) {
                        if ($videoSite['name'] == 'Chaturbate') {
                            $apiUrl   = $videoSite['api_link'];
                            $userName = "sweet_tokyo";
                            $token    = "InNBK83m9hM2rIhloqgVSObp";
                            $content  = file_get_contents("$apiUrl/?username=$userName&token=$token");
                            if ($content != "") {
                                $data         = json_decode($content, true);
                                $currentAmout = $data['token_balance'];
                                $amount       = 0.00;

                                $modelIncome = Income::where("user_id", $modelId)->where("tour_id", $tourId)->orderBy("id", "desc");

                                if ($modelIncome->count() > 0) {
                                    $amount = $currentAmout - $modelIncome->first()->last_model_balance;
                                }

                                $income                     = new Income();
                                $income->studio_id          = $tourHour->studio_id;
                                $income->user_id            = $modelId;
                                $income->tour_id            = $tourId;
                                $income->site_id            = $videoSite['id'];
                                $income->amount             = $amount;
                                $income->last_model_balance = $currentAmout;
                                $income->income_response    = $content;
                                $income->exchange_in_dollar = "";
                                $income->time               = date("H:i");
                                $income->date               = date("Y-m-d");
                                $income->created_at         = date("Y-m-d H:i:s");
                                $income->updated_at         = date("Y-m-d H:i:s");
                                $income->save();
                            }
                        }
                    }
                }
            }
        }
    }
}
