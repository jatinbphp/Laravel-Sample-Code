<?php

namespace App\Jobs;

use App\Models\EmailTemplate;
use App\Models\UserContract;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Mail;

class UserContractSendJob
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * The userContract instance.
     *
     * @var \App\Models\UserContract
     */
    protected $userContract;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserContract $userContract)
    {
        $this->userContract = $userContract;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $defaultEmailTemplate = EmailTemplate::where("is_active", "default")->first();

        $userContract = $this->userContract;

        $emailTemplate = EmailTemplate::where("studio_id", $userContract->studio_id)->where("is_active", "0")->orderBy("id", "ASC")->first();

        $content = "";

        if (isset($emailTemplate)) {
            $content = stripslashes(str_replace("\\", '', $emailTemplate->template_content));
        } else {
            $content = stripslashes(str_replace("\\", '', $defaultEmailTemplate->template_content));
        }

        $final['url']        = route("contract.user.view", Crypt::encrypt($userContract->id));
        $final['userName']   = $userContract->user_name;
        $final['studioName'] = $userContract->studio_name;

        $userEmail  = $userContract->email;
        $studioName = $userContract->studio_name;

        $final['content'] = str_replace(["~date~", "~url~", "~user_name~", "~studio_name~", "~app_url~", "~year~"], [date("Y-m-d"), $final['url'], $final['userName'], $final['studioName'], config('app.url'), date("Y")], $content);

        Mail::send('contract.send', $final, function ($m) use ($userEmail, $studioName) {
            $m->from(Config("mail.from.address"), $studioName);
            $m->to($userEmail)->subject("Your Contract");
        });

        if (!Mail::failures()) {
            $userContract->is_sign = "1";
        } else {
            $userContract->is_sign = "0";
        }
        $userContract->save();
    }
}
