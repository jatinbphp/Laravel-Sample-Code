<?php

namespace App\Mail;

use App\Models\User;
use App\Models\UserContract;
use App\Scopes\ActiveScope;
use Hash;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;

class UserWelcomeMail extends Mailable
{
    use SerializesModels;

    /**
     * The userContract instance.
     *
     * @var \App\Models\User
     */
    protected $userId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userId = $this->userId;

        $url            = url('/login');
        $newPassword    = getUniqueFileName(15);
        $user           = User::withoutGlobalScope(ActiveScope::class)->find($userId);
        $user->password = Hash::make($newPassword);
        $user->save();

        $studioName = $user->studio->name;

        if ($studioName == "") {
            $studioName = "The Webcam Lab";
        }

        return $this->from(Config("mail.from.address"), $studioName)
            ->view('mail.welcome')
            ->subject("Welcome to $studioName")
            ->with([
                'url'        => $url,
                'password'   => $newPassword,
                'email'      => $user->email,
                'studioName' => $studioName,
                'userName'   => $user->name,
            ]);
    }
}
