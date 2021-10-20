<?php

namespace App\Console\Commands;

use App\Mail\UserContractDownloadPDF;
use App\Models\User;
use App\Models\UserContract;
use App\Scopes\ActiveScope;
use Artisan;
use Illuminate\Console\Command;
use Mail;

class GeneratePDF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contract:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Contract PDF';

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

        $userContractIds = UserContract::whereNull("pdf_path")->whereNotNull("sign")->where("is_sign", "2")->pluck("id")->all();

        $superAdmin = User::where("role_id", "1")->whereNotNull("signature")->where("auto_service_request", "1")->first();

        $userDirectory = "contract";
        $pdfPath       = storage_path("app/public/" . $userDirectory);
        makeDir($pdfPath, true);

        foreach ($userContractIds as $key => $userContractId) {
            $contract = UserContract::find($userContractId);

            // generate Contract PDF
            $content = stripslashes(str_replace(["\\", "~CSS~", "~CSS_T~", "~CSS3~"], ["", css(), css_t(), css3()], $contract->content));
            $pdf     = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadView('contract.pdf', compact('content', 'pdf'));
            $fileName = getUniqueFileName() . ".pdf";
            $pdf->save($pdfPath . '/' . $fileName);
            $contract->pdf_path = $fileName;
            $contract->save();

            if ($contract->is_send_mail == "1") {
                $user      = User::withoutGlobalScope(ActiveScope::class)->find($contract->user_id);
                $userEmail = $user->email;
                Mail::to($userEmail)->send(new UserContractDownloadPDF($userContractId));
            }
        }

        Artisan::call("service:request");

        return 0;
    }
}
