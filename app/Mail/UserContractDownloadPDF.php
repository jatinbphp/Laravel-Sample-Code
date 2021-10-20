<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\UserContract;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class UserContractDownloadPDF extends Mailable
{
    use SerializesModels;

    /**
     * The userContract instance.
     *
     * @var \App\Models\UserContract
     */
    protected $userContractId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userContractId)
    {
        $this->userContractId = $userContractId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userContract = UserContract::select("user_contract.id", "user_contract.studio_id", "studio.name as studio_name", "user_contract.studio_id", "user_contract.is_sign", "users.name as user_name", "users.email")->where("user_contract.id", $this->userContractId)->where("user_contract.is_sign", "2")->whereNotNull("user_contract.sign")->whereNotNull("user_contract.pdf_path")->leftJoin("users", "users.id", "user_contract.user_id")->leftJoin("studio", "studio.id", "user_contract.studio_id")->first();

        if ($userContract) {

            $emailTemplate = EmailTemplate::where("studio_id", $userContract->studio_id)->orderBy("id", "DESC")->first();

            $content = "";

            if ($emailTemplate) {
                $content = stripslashes(str_replace("\\", '', $emailTemplate->template_content));
            }

            $url        = route("contract.user.pdf", Crypt::encrypt($userContract->id));
            $userName   = ucfirst($userContract->user_name);
            $studioName = ucfirst($userContract->studio_name);

            $content = str_replace(["~date~", "~url~", "~user_name~", "~studio_name~", "~app_url~", "~year~"], [date("Y-m-d"), $url, $userName, $studioName, config('app.url'), date("Y")], $content);

            return $this->from(Config("mail.from.address"), $studioName)
                ->view('contract.mail')
                ->with([
                    'content'    => $content,
                    'url'        => $url,
                    'studioName' => $studioName,
                    'userName'   => $userName,
                ]);
        }
    }
}
