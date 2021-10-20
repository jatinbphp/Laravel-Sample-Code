<?php

namespace App\Console\Commands;

use App\Models\ServiceRequest;
use App\Models\ServiceRequestTemplate;
use App\Models\User;
use App\Models\UserContract;
use App\Scopes\ActiveScope;
use Illuminate\Console\Command;

class ServiceRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Service Request';

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

        $this->insertSpaceRequest();

        $this->insertTraingRequest();

        $superAdminRequests = ServiceRequest::whereNotNull("over_by_user_id")->whereNotNull("user_id")->whereNull("pdf_path")->whereRaw("content like '%~ADMIN_%'")->pluck("id")->all();

        if (count($superAdminRequests) > 0) {

            $superAdmin = User::where("role_id", "1")->whereNotNull("signature")->where("auto_service_request", "1")->first();

            foreach ($superAdminRequests as $key => $serviceRequest) {
                $replaceData    = [];
                $serviceRequest = ServiceRequest::find($serviceRequest);
                $signatureAdmin = null;
                $signatureAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("id", $userContract->signature_user_id)->first();

                if (isset($signatureAdmin) && $signatureAdmin->id != "") {
                    $serviceRequest->over_by_user_id            = $signatureAdmin->id;
                    $replaceData['~ADMIN_NAME~']                = (isset($signatureAdmin->name) ? $signatureAdmin->name : 'ADMIN_NAME');
                    $replaceData['~ADMIN_EMAIL~']               = (isset($signatureAdmin->email) ? $signatureAdmin->email : 'ADMIN_EMAIL');
                    $replaceData['~ADMIN_REAL_NAME~']           = (isset($signatureAdmin->real_name) ? $signatureAdmin->real_name : 'ADMIN_REAL_NAME');
                    $replaceData['~ADMIN_PHONE~']               = (isset($signatureAdmin->phone) ? $signatureAdmin->phone : 'ADMIN_PHONE');
                    $replaceData['~ADMIN_BIRTHDAY~']            = (isset($signatureAdmin->birth_date) ? $signatureAdmin->birth_date : 'ADMIN_BIRTHDAY');
                    $replaceData['~ADMIN_COMPANY_NAME~']        = (isset($signatureAdmin->company_name) ? $signatureAdmin->company_name : 'ADMIN_COMPANY_NAME');
                    $replaceData['~ADMIN_COMPANY_REGISTER_NO~'] = (isset($signatureAdmin->company_register_no) ? $signatureAdmin->company_register_no : 'ADMIN_COMPANY_REGISTER_NO');
                    $replaceData['~ADMIN_COMPANY_ADDRESS~']     = (isset($signatureAdmin->company_address) ? $signatureAdmin->company_address : 'ADMIN_COMPANY_ADDRESS');
                    $replaceData['~ADMIN_COMPANY_CITY~']        = (isset($signatureAdmin->company_city) ? $signatureAdmin->company_city : 'ADMIN_COMPANY_CITY');
                    $replaceData['~ADMIN_COMPANY_STATE~']       = (isset($signatureAdmin->company_state) ? $signatureAdmin->company_state : 'ADMIN_COMPANY_STATE');
                    $replaceData['~ADMIN_COMPANY_COUNTRY~']     = (isset($signatureAdmin->company_country) ? $signatureAdmin->company_country : 'ADMIN_COMPANY_COUNTRY');
                    $replaceData['~ADMIN_COMPANY_PHONE~']       = (isset($signatureAdmin->company_phone) ? $signatureAdmin->company_phone : 'ADMIN_COMPANY_PHONE');
                    $replaceData['~ADMIN_COMPANY_EMAIL~']       = (isset($signatureAdmin->company_email) ? $signatureAdmin->company_email : 'ADMIN_COMPANY_EMAIL');
                    $replaceData['~ADMIN_BANK_ACCOUNT_NO~']     = (isset($signatureAdmin->bank_account_no) ? $signatureAdmin->bank_account_no : 'ADMIN_BANK_ACCOUNT_NO');
                    $replaceData['~ADMIN_BANK_NAME~']           = (isset($signatureAdmin->bank_name) ? $signatureAdmin->bank_name : 'ADMIN_BANK_NAME');
                    $replaceData["~signature_admin~"]           = "<img src='" . $signatureAdmin->signature . "' height='100px' width='100px'/>";
                    $replaceData["~CONTRACT_START_DATE~"]       = $userContract->contract_start_date;
                    $replaceData["~CONTRACT_END_DATE~"]         = $userContract->contract_end_date;
                    $serviceRequest->content                    = str_replace(array_keys($replaceData), array_values($replaceData), $serviceRequest->content);
                    $serviceRequest->save();
                }
            }
        }

        $serviceRequests = ServiceRequest::whereNotNull("over_by_user_id")->whereNotNull("user_id")->whereNotNull("role_id")->whereRaw("content NOT like '%~signature_admin~%'")->whereRaw("content NOT like '%~signature_spaces_admin~%'")->whereRaw("content NOT like '%~signature_training_admin~%'")->whereNull("pdf_path")->get();

        if (count($serviceRequests) > 0) {
            $userDirectory = "service_request";
            $pdfPath       = storage_path("app/public/" . $userDirectory);
            makeDir($pdfPath, true);

            foreach ($serviceRequests as $key => $serviceRequest) {
                $content = stripslashes(str_replace("\\", '', $serviceRequest->content));
                $pdf     = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf->loadView('service_request.pdf', compact('content', 'pdf'));
                $pdfFileName = getUniqueFileName() . ".pdf";
                $pdf->save($pdfPath . '/' . $pdfFileName);
                $serviceRequest->pdf_path = $pdfFileName;
                $serviceRequest->save();
            }
        }

        return 0;
    }

    /**
     * [insertSpaceRequest description]
     * @return [type] [description]
     */
    public function insertSpaceRequest()
    {
        $superAdmin = User::where("role_id", "1")->whereNotNull("signature")->where("auto_service_request", "1")->first();

        $serviceTemplates = ServiceRequestTemplate::whereNotNull("template_content")->where("is_active", "0")->where("role_id", "4")->get();

        foreach ($serviceTemplates as $key => $serviceTemplate) {

            $userContracts = UserContract::select("id", "agency_id", "studio_id", "user_id", "spaces_service_request_id", "content_fields_data", "signature_user_id", "contract_start_date", "contract_end_date")->whereNotNull("sign")->whereNotNull("pdf_path")->where("role_id", "12")->where("is_sign", "2")->whereNull("spaces_service_request_id")->where("studio_id", $serviceTemplate->studio_id)->get();

            $spacesAdmin = null;

            $spacesAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("role_id", "4")->where("studio_id", $serviceTemplate->studio_id)->whereNotNull("signature")->where("auto_service_request", "1")->first();

            $templateFields = [];

            if (isset($serviceTemplate->template_fields)) {
                $templateFields = explode(",", $serviceTemplate->template_fields);
            }

            foreach ($userContracts as $key => $userContract) {
                $signatureAdmin = null;

                $signatureAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("id", $userContract->signature_user_id)->first();

                $replaceData = [];

                $modelName                   = User::withoutGlobalScope(ActiveScope::class)->find($userContract->user_id)->name;
                $replaceData["~MODEL_NAME~"] = (isset($modelName) && $modelName != "") ? $modelName : "~MODEL_NAME~";

                $fieldsData = json_decode($userContract->content_fields_data, true);

                foreach ($templateFields as $key => $field) {
                    if (isset($fieldsData["$field"])) {
                        $replaceData["~$field~"] = $fieldsData["$field"];
                    }
                }

                $serviceRequest              = new ServiceRequest();
                $serviceRequest->agency_id   = $userContract->agency_id;
                $serviceRequest->studio_id   = $userContract->studio_id;
                $serviceRequest->model_id    = $userContract->user_id;
                $serviceRequest->contract_id = $userContract->id;
                $serviceRequest->role_id     = $serviceTemplate->role_id;

                if (isset($signatureAdmin) && $signatureAdmin->id != "") {
                    $serviceRequest->over_by_user_id            = $signatureAdmin->id;
                    $replaceData['~ADMIN_NAME~']                = (isset($signatureAdmin->name) ? $signatureAdmin->name : 'ADMIN_NAME');
                    $replaceData['~ADMIN_EMAIL~']               = (isset($signatureAdmin->email) ? $signatureAdmin->email : 'ADMIN_EMAIL');
                    $replaceData['~ADMIN_REAL_NAME~']           = (isset($signatureAdmin->real_name) ? $signatureAdmin->real_name : 'ADMIN_REAL_NAME');
                    $replaceData['~ADMIN_PHONE~']               = (isset($signatureAdmin->phone) ? $signatureAdmin->phone : 'ADMIN_PHONE');
                    $replaceData['~ADMIN_BIRTHDAY~']            = (isset($signatureAdmin->birth_date) ? $signatureAdmin->birth_date : 'ADMIN_BIRTHDAY');
                    $replaceData['~ADMIN_COMPANY_NAME~']        = (isset($signatureAdmin->company_name) ? $signatureAdmin->company_name : 'ADMIN_COMPANY_NAME');
                    $replaceData['~ADMIN_COMPANY_REGISTER_NO~'] = (isset($signatureAdmin->company_register_no) ? $signatureAdmin->company_register_no : 'ADMIN_COMPANY_REGISTER_NO');
                    $replaceData['~ADMIN_COMPANY_ADDRESS~']     = (isset($signatureAdmin->company_address) ? $signatureAdmin->company_address : 'ADMIN_COMPANY_ADDRESS');
                    $replaceData['~ADMIN_COMPANY_CITY~']        = (isset($signatureAdmin->company_city) ? $signatureAdmin->company_city : 'ADMIN_COMPANY_CITY');
                    $replaceData['~ADMIN_COMPANY_STATE~']       = (isset($signatureAdmin->company_state) ? $signatureAdmin->company_state : 'ADMIN_COMPANY_STATE');
                    $replaceData['~ADMIN_COMPANY_COUNTRY~']     = (isset($signatureAdmin->company_country) ? $signatureAdmin->company_country : 'ADMIN_COMPANY_COUNTRY');
                    $replaceData['~ADMIN_COMPANY_PHONE~']       = (isset($signatureAdmin->company_phone) ? $signatureAdmin->company_phone : 'ADMIN_COMPANY_PHONE');
                    $replaceData['~ADMIN_COMPANY_EMAIL~']       = (isset($signatureAdmin->company_email) ? $signatureAdmin->company_email : 'ADMIN_COMPANY_EMAIL');
                    $replaceData['~ADMIN_BANK_ACCOUNT_NO~']     = (isset($signatureAdmin->bank_account_no) ? $signatureAdmin->bank_account_no : 'ADMIN_BANK_ACCOUNT_NO');
                    $replaceData['~ADMIN_BANK_NAME~']           = (isset($signatureAdmin->bank_name) ? $signatureAdmin->bank_name : 'ADMIN_BANK_NAME');
                    $replaceData["~signature_admin~"]           = "<img src='" . $signatureAdmin->signature . "' height='100px' width='100px'/>";
                    $replaceData["~CONTRACT_START_DATE~"]       = $userContract->contract_start_date;
                    $replaceData["~CONTRACT_END_DATE~"]         = $userContract->contract_end_date;
                } else if (isset($superAdmin) && $superAdmin->id != "") {
                    $serviceRequest->over_by_user_id  = $superAdmin->id;
                    $replaceData["~signature_admin~"] = "<img src='" . $superAdmin->signature . "' height='100px' width='100px'/>";
                }

                if (isset($spacesAdmin->id) && $spacesAdmin->id != "") {
                    $serviceRequest->user_id                     = $spacesAdmin->id;
                    $replaceData['~STUDIO_NAME~']                = (isset($spacesAdmin->name) ? $spacesAdmin->name : 'STUDIO_NAME');
                    $replaceData['~STUDIO_EMAIL~']               = (isset($spacesAdmin->email) ? $spacesAdmin->email : 'STUDIO_EMAIL');
                    $replaceData['~STUDIO_REAL_NAME~']           = (isset($spacesAdmin->real_name) ? $spacesAdmin->real_name : 'STUDIO_REAL_NAME');
                    $replaceData['~STUDIO_PHONE~']               = (isset($spacesAdmin->phone) ? $spacesAdmin->phone : 'STUDIO_PHONE');
                    $replaceData['~STUDIO_BIRTHDAY~']            = (isset($spacesAdmin->birth_date) ? $spacesAdmin->birth_date : 'STUDIO_BIRTHDAY');
                    $replaceData['~STUDIO_COMPANY_NAME~']        = (isset($spacesAdmin->company_name) ? $spacesAdmin->company_name : 'STUDIO_COMPANY_NAME');
                    $replaceData['~STUDIO_COMPANY_REGISTER_NO~'] = (isset($spacesAdmin->company_register_no) ? $spacesAdmin->company_register_no : 'STUDIO_COMPANY_REGISTER_NO');
                    $replaceData['~STUDIO_COMPANY_ADDRESS~']     = (isset($spacesAdmin->company_address) ? $spacesAdmin->company_address : 'STUDIO_COMPANY_ADDRESS');
                    $replaceData['~STUDIO_COMPANY_CITY~']        = (isset($spacesAdmin->company_city) ? $spacesAdmin->company_city : 'STUDIO_COMPANY_CITY');
                    $replaceData['~STUDIO_COMPANY_STATE~']       = (isset($spacesAdmin->company_state) ? $spacesAdmin->company_state : 'STUDIO_COMPANY_STATE');
                    $replaceData['~STUDIO_COMPANY_COUNTRY~']     = (isset($spacesAdmin->company_country) ? $spacesAdmin->company_country : 'STUDIO_COMPANY_COUNTRY');
                    $replaceData['~STUDIO_COMPANY_PHONE~']       = (isset($spacesAdmin->company_phone) ? $spacesAdmin->company_phone : 'STUDIO_COMPANY_PHONE');
                    $replaceData['~STUDIO_COMPANY_EMAIL~']       = (isset($spacesAdmin->company_email) ? $spacesAdmin->company_email : 'STUDIO_COMPANY_EMAIL');
                    $replaceData['~STUDIO_BANK_ACCOUNT_NO~']     = (isset($spacesAdmin->bank_account_no) ? $spacesAdmin->bank_account_no : 'STUDIO_BANK_ACCOUNT_NO');
                    $replaceData['~STUDIO_BANK_NAME~']           = (isset($spacesAdmin->bank_name) ? $spacesAdmin->bank_name : 'STUDIO_BANK_NAME');
                    $replaceData["~signature_spaces_admin~"]     = "<img src='" . $spacesAdmin->signature . "' height='100px' width='100px'/>";
                }

                $templateContent = stripslashes(str_replace("\\", "", $serviceTemplate->template_content));

                $serviceRequest->content = addslashes(str_replace(array_keys($replaceData), array_values($replaceData), $templateContent));
                $serviceRequest->save();
                $userContract->spaces_service_request_id = $serviceRequest->id;
                $userContract->save();
            }

            if (isset($spacesAdmin)) {
                ServiceRequest::whereNull("user_id")->where("role_id", "4")->where("studio_id", $serviceTemplate->studio_id)->update([
                    'user_id' => $spacesAdmin->id,
                ]);
            }
        }

        $spacesRequests = ServiceRequest::whereNotNull("over_by_user_id")->whereNotNull("user_id")->whereNull("pdf_path")->whereRaw("content like '%~STUDIO_%'")->where("role_id", "4")->get();

        if (count($spacesRequests) > 0) {
            foreach ($spacesRequests as $key => $serviceRequest) {
                $spacesAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("role_id", "4")->whereNotNull("signature")->where("id", $serviceRequest->user_id)->first();
                if (isset($spacesAdmin) && $spacesAdmin->id != "") {
                    $replaceData['~STUDIO_NAME~']                = (isset($spacesAdmin->name) ? $spacesAdmin->name : 'STUDIO_NAME');
                    $replaceData['~STUDIO_EMAIL~']               = (isset($spacesAdmin->email) ? $spacesAdmin->email : 'STUDIO_EMAIL');
                    $replaceData['~STUDIO_REAL_NAME~']           = (isset($spacesAdmin->real_name) ? $spacesAdmin->real_name : 'STUDIO_REAL_NAME');
                    $replaceData['~STUDIO_PHONE~']               = (isset($spacesAdmin->phone) ? $spacesAdmin->phone : 'STUDIO_PHONE');
                    $replaceData['~STUDIO_BIRTHDAY~']            = (isset($spacesAdmin->birth_date) ? $spacesAdmin->birth_date : 'STUDIO_BIRTHDAY');
                    $replaceData['~STUDIO_COMPANY_NAME~']        = (isset($spacesAdmin->company_name) ? $spacesAdmin->company_name : 'STUDIO_COMPANY_NAME');
                    $replaceData['~STUDIO_COMPANY_REGISTER_NO~'] = (isset($spacesAdmin->company_register_no) ? $spacesAdmin->company_register_no : 'STUDIO_COMPANY_REGISTER_NO');
                    $replaceData['~STUDIO_COMPANY_ADDRESS~']     = (isset($spacesAdmin->company_address) ? $spacesAdmin->company_address : 'STUDIO_COMPANY_ADDRESS');
                    $replaceData['~STUDIO_COMPANY_CITY~']        = (isset($spacesAdmin->company_city) ? $spacesAdmin->company_city : 'STUDIO_COMPANY_CITY');
                    $replaceData['~STUDIO_COMPANY_STATE~']       = (isset($spacesAdmin->company_state) ? $spacesAdmin->company_state : 'STUDIO_COMPANY_STATE');
                    $replaceData['~STUDIO_COMPANY_COUNTRY~']     = (isset($spacesAdmin->company_country) ? $spacesAdmin->company_country : 'STUDIO_COMPANY_COUNTRY');
                    $replaceData['~STUDIO_COMPANY_PHONE~']       = (isset($spacesAdmin->company_phone) ? $spacesAdmin->company_phone : 'STUDIO_COMPANY_PHONE');
                    $replaceData['~STUDIO_COMPANY_EMAIL~']       = (isset($spacesAdmin->company_email) ? $spacesAdmin->company_email : 'STUDIO_COMPANY_EMAIL');
                    $replaceData['~STUDIO_BANK_ACCOUNT_NO~']     = (isset($spacesAdmin->bank_account_no) ? $spacesAdmin->bank_account_no : 'STUDIO_BANK_ACCOUNT_NO');
                    $replaceData['~STUDIO_BANK_NAME~']           = (isset($spacesAdmin->bank_name) ? $spacesAdmin->bank_name : 'STUDIO_BANK_NAME');
                    $replaceData["~signature_spaces_admin~"]     = "<img src='" . $spacesAdmin->signature . "' height='100px' width='100px'/>";
                    $serviceRequest->content                     = str_replace(array_keys($replaceData), array_values($replaceData), $serviceRequest->content);
                    $serviceRequest->save();
                }
            }
        }
    }

    /**
     * [insertTraingRequest description]
     * @return [type] [description]
     */
    public function insertTraingRequest()
    {
        $superAdmin = User::where("role_id", "1")->whereNotNull("signature")->where("auto_service_request", "1")->first();

        $serviceTemplates = ServiceRequestTemplate::whereNotNull("template_content")->where("is_active", "0")->where("role_id", "3")->get();

        $templateFields = [];

        if (isset($serviceTemplate->template_fields)) {
            $templateFields = explode(",", $serviceTemplate->template_fields);
        }

        foreach ($serviceTemplates as $key => $serviceTemplate) {

            $userContracts = UserContract::select("id", "agency_id", "studio_id", "user_id", "training_service_request_id", "signature_user_id", "contract_start_date", "contract_end_date")->whereNotNull("sign")->whereNotNull("pdf_path")->where("role_id", "12")->where("is_sign", "2")->whereNull("training_service_request_id")->where("studio_id", $serviceTemplate->studio_id)->get();

            $trainingAdmin = null;
            $trainingAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("role_id", "3")->where("studio_id", $serviceTemplate->studio_id)->whereNotNull("signature")->where("auto_service_request", "1")->first();

            $templateFields = [];

            if (isset($serviceTemplate->template_fields)) {
                $templateFields = explode(",", $serviceTemplate->template_fields);
            }

            foreach ($userContracts as $key => $userContract) {

                $signatureAdmin = null;

                $signatureAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("id", $userContract->signature_user_id)->first();

                $replaceData = [];

                $modelName                   = User::withoutGlobalScope(ActiveScope::class)->find($userContract->user_id)->name;
                $replaceData["~MODEL_NAME~"] = (isset($modelName) && $modelName != "") ? $modelName : "~MODEL_NAME~";

                $fieldsData = json_decode($userContract->content_fields_data, true);

                foreach ($templateFields as $key => $field) {
                    if (isset($fieldsData["$field"])) {
                        $replaceData["~$field~"] = $fieldsData["$field"];
                    }
                }

                $serviceRequest              = new ServiceRequest();
                $serviceRequest->agency_id   = $userContract->agency_id;
                $serviceRequest->studio_id   = $userContract->studio_id;
                $serviceRequest->model_id    = $userContract->user_id;
                $serviceRequest->contract_id = $userContract->id;
                $serviceRequest->role_id     = $serviceTemplate->role_id;

                if (isset($signatureAdmin) && $signatureAdmin->id != "") {
                    $serviceRequest->over_by_user_id            = $signatureAdmin->id;
                    $replaceData['~ADMIN_NAME~']                = (isset($signatureAdmin->name) ? $signatureAdmin->name : 'ADMIN_NAME');
                    $replaceData['~ADMIN_EMAIL~']               = (isset($signatureAdmin->email) ? $signatureAdmin->email : 'ADMIN_EMAIL');
                    $replaceData['~ADMIN_REAL_NAME~']           = (isset($signatureAdmin->real_name) ? $signatureAdmin->real_name : 'ADMIN_REAL_NAME');
                    $replaceData['~ADMIN_PHONE~']               = (isset($signatureAdmin->phone) ? $signatureAdmin->phone : 'ADMIN_PHONE');
                    $replaceData['~ADMIN_BIRTHDAY~']            = (isset($signatureAdmin->birth_date) ? $signatureAdmin->birth_date : 'ADMIN_BIRTHDAY');
                    $replaceData['~ADMIN_COMPANY_NAME~']        = (isset($signatureAdmin->company_name) ? $signatureAdmin->company_name : 'ADMIN_COMPANY_NAME');
                    $replaceData['~ADMIN_COMPANY_REGISTER_NO~'] = (isset($signatureAdmin->company_register_no) ? $signatureAdmin->company_register_no : 'ADMIN_COMPANY_REGISTER_NO');
                    $replaceData['~ADMIN_COMPANY_ADDRESS~']     = (isset($signatureAdmin->company_address) ? $signatureAdmin->company_address : 'ADMIN_COMPANY_ADDRESS');
                    $replaceData['~ADMIN_COMPANY_CITY~']        = (isset($signatureAdmin->company_city) ? $signatureAdmin->company_city : 'ADMIN_COMPANY_CITY');
                    $replaceData['~ADMIN_COMPANY_STATE~']       = (isset($signatureAdmin->company_state) ? $signatureAdmin->company_state : 'ADMIN_COMPANY_STATE');
                    $replaceData['~ADMIN_COMPANY_COUNTRY~']     = (isset($signatureAdmin->company_country) ? $signatureAdmin->company_country : 'ADMIN_COMPANY_COUNTRY');
                    $replaceData['~ADMIN_COMPANY_PHONE~']       = (isset($signatureAdmin->company_phone) ? $signatureAdmin->company_phone : 'ADMIN_COMPANY_PHONE');
                    $replaceData['~ADMIN_COMPANY_EMAIL~']       = (isset($signatureAdmin->company_email) ? $signatureAdmin->company_email : 'ADMIN_COMPANY_EMAIL');
                    $replaceData['~ADMIN_BANK_ACCOUNT_NO~']     = (isset($signatureAdmin->bank_account_no) ? $signatureAdmin->bank_account_no : 'ADMIN_BANK_ACCOUNT_NO');
                    $replaceData['~ADMIN_BANK_NAME~']           = (isset($signatureAdmin->bank_name) ? $signatureAdmin->bank_name : 'ADMIN_BANK_NAME');
                    $replaceData["~signature_admin~"]           = "<img src='" . $signatureAdmin->signature . "' height='100px' width='100px'/>";
                    $replaceData["~CONTRACT_START_DATE~"]       = $userContract->contract_start_date;
                    $replaceData["~CONTRACT_END_DATE~"]         = $userContract->contract_end_date;
                } else if (isset($superAdmin) && $superAdmin->id != "") {
                    $serviceRequest->over_by_user_id  = $superAdmin->id;
                    $replaceData["~signature_admin~"] = "<img src='" . $superAdmin->signature . "' height='100px' width='100px'/>";
                }

                if (isset($trainingAdmin) && $trainingAdmin->id != "") {
                    $serviceRequest->user_id                     = $trainingAdmin->id;
                    $replaceData['~STUDIO_NAME~']                = (isset($trainingAdmin->name) ? $trainingAdmin->name : 'STUDIO_NAME');
                    $replaceData['~STUDIO_EMAIL~']               = (isset($trainingAdmin->email) ? $trainingAdmin->email : 'STUDIO_EMAIL');
                    $replaceData['~STUDIO_REAL_NAME~']           = (isset($trainingAdmin->real_name) ? $trainingAdmin->real_name : 'STUDIO_REAL_NAME');
                    $replaceData['~STUDIO_PHONE~']               = (isset($trainingAdmin->phone) ? $trainingAdmin->phone : 'STUDIO_PHONE');
                    $replaceData['~STUDIO_BIRTHDAY~']            = (isset($trainingAdmin->birth_date) ? $trainingAdmin->birth_date : 'STUDIO_BIRTHDAY');
                    $replaceData['~STUDIO_COMPANY_NAME~']        = (isset($trainingAdmin->company_name) ? $trainingAdmin->company_name : 'STUDIO_COMPANY_NAME');
                    $replaceData['~STUDIO_COMPANY_REGISTER_NO~'] = (isset($trainingAdmin->company_register_no) ? $trainingAdmin->company_register_no : 'STUDIO_COMPANY_REGISTER_NO');
                    $replaceData['~STUDIO_COMPANY_ADDRESS~']     = (isset($trainingAdmin->company_address) ? $trainingAdmin->company_address : 'STUDIO_COMPANY_ADDRESS');
                    $replaceData['~STUDIO_COMPANY_CITY~']        = (isset($trainingAdmin->company_city) ? $trainingAdmin->company_city : 'STUDIO_COMPANY_CITY');
                    $replaceData['~STUDIO_COMPANY_STATE~']       = (isset($trainingAdmin->company_state) ? $trainingAdmin->company_state : 'STUDIO_COMPANY_STATE');
                    $replaceData['~STUDIO_COMPANY_COUNTRY~']     = (isset($trainingAdmin->company_country) ? $trainingAdmin->company_country : 'STUDIO_COMPANY_COUNTRY');
                    $replaceData['~STUDIO_COMPANY_PHONE~']       = (isset($trainingAdmin->company_phone) ? $trainingAdmin->company_phone : 'STUDIO_COMPANY_PHONE');
                    $replaceData['~STUDIO_COMPANY_EMAIL~']       = (isset($trainingAdmin->company_email) ? $trainingAdmin->company_email : 'STUDIO_COMPANY_EMAIL');
                    $replaceData['~STUDIO_BANK_ACCOUNT_NO~']     = (isset($trainingAdmin->bank_account_no) ? $trainingAdmin->bank_account_no : 'STUDIO_BANK_ACCOUNT_NO');
                    $replaceData['~STUDIO_BANK_NAME~']           = (isset($trainingAdmin->bank_name) ? $trainingAdmin->bank_name : 'STUDIO_BANK_NAME');
                    $replaceData["~signature_training_admin~"]   = "<img src='" . $trainingAdmin->signature . "' height='100px' width='100px'/>";
                }

                $templateContent         = stripslashes(str_replace("\\", "", $serviceTemplate->template_content));
                $serviceRequest->content = addslashes(str_replace(array_keys($replaceData), array_values($replaceData), $templateContent));
                $serviceRequest->save();
                $userContract->training_service_request_id = $serviceRequest->id;
                $userContract->save();
            }

            if (isset($trainingAdmin)) {
                ServiceRequest::whereNull("user_id")->where("role_id", "4")->where("studio_id", $serviceTemplate->studio_id)->whereNull("user_id")->update([
                    'user_id' => $trainingAdmin->id,
                ]);
            }
        }

        $trainingRequests = ServiceRequest::whereNotNull("over_by_user_id")->whereNotNull("user_id")->whereNull("pdf_path")->whereRaw("content like '%~STUDIO_%'")->where("role_id", "3")->get();

        if (count($trainingRequests) > 0) {
            foreach ($trainingRequests as $key => $serviceRequest) {
                $trainingAdmin = null;
                $trainingAdmin = User::withoutGlobalScope(ActiveScope::class)->select("id", "name", "email", "real_name", "company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone", "bank_account_no", "bank_name", "birth_date", "signature")->where("role_id", "3")->whereNotNull("signature")->where("id", $serviceRequest->user_id)->first();
                if (isset($trainingAdmin) && $trainingAdmin->id != "") {
                    $serviceRequest->user_id                     = $trainingAdmin->id;
                    $replaceData['~STUDIO_NAME~']                = (isset($trainingAdmin->name) ? $trainingAdmin->name : 'STUDIO_NAME');
                    $replaceData['~STUDIO_EMAIL~']               = (isset($trainingAdmin->email) ? $trainingAdmin->email : 'STUDIO_EMAIL');
                    $replaceData['~STUDIO_REAL_NAME~']           = (isset($trainingAdmin->real_name) ? $trainingAdmin->real_name : 'STUDIO_REAL_NAME');
                    $replaceData['~STUDIO_PHONE~']               = (isset($trainingAdmin->phone) ? $trainingAdmin->phone : 'STUDIO_PHONE');
                    $replaceData['~STUDIO_BIRTHDAY~']            = (isset($trainingAdmin->birth_date) ? $trainingAdmin->birth_date : 'STUDIO_BIRTHDAY');
                    $replaceData['~STUDIO_COMPANY_NAME~']        = (isset($trainingAdmin->company_name) ? $trainingAdmin->company_name : 'STUDIO_COMPANY_NAME');
                    $replaceData['~STUDIO_COMPANY_REGISTER_NO~'] = (isset($trainingAdmin->company_register_no) ? $trainingAdmin->company_register_no : 'STUDIO_COMPANY_REGISTER_NO');
                    $replaceData['~STUDIO_COMPANY_ADDRESS~']     = (isset($trainingAdmin->company_address) ? $trainingAdmin->company_address : 'STUDIO_COMPANY_ADDRESS');
                    $replaceData['~STUDIO_COMPANY_CITY~']        = (isset($trainingAdmin->company_city) ? $trainingAdmin->company_city : 'STUDIO_COMPANY_CITY');
                    $replaceData['~STUDIO_COMPANY_STATE~']       = (isset($trainingAdmin->company_state) ? $trainingAdmin->company_state : 'STUDIO_COMPANY_STATE');
                    $replaceData['~STUDIO_COMPANY_COUNTRY~']     = (isset($trainingAdmin->company_country) ? $trainingAdmin->company_country : 'STUDIO_COMPANY_COUNTRY');
                    $replaceData['~STUDIO_COMPANY_PHONE~']       = (isset($trainingAdmin->company_phone) ? $trainingAdmin->company_phone : 'STUDIO_COMPANY_PHONE');
                    $replaceData['~STUDIO_COMPANY_EMAIL~']       = (isset($trainingAdmin->company_email) ? $trainingAdmin->company_email : 'STUDIO_COMPANY_EMAIL');
                    $replaceData['~STUDIO_BANK_ACCOUNT_NO~']     = (isset($trainingAdmin->bank_account_no) ? $trainingAdmin->bank_account_no : 'STUDIO_BANK_ACCOUNT_NO');
                    $replaceData['~STUDIO_BANK_NAME~']           = (isset($trainingAdmin->bank_name) ? $trainingAdmin->bank_name : 'STUDIO_BANK_NAME');
                    $replaceData["~signature_training_admin~"]   = "<img src='" . $trainingAdmin->signature . "' height='100px' width='100px'/>";
                    $serviceRequest->content                     = str_replace(array_keys($replaceData), array_values($replaceData), $serviceRequest->content);
                    $serviceRequest->save();
                }
            }
        }
    }
}
