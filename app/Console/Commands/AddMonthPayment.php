<?php

namespace App\Console\Commands;

use App\Payment;
use App\SalaryLoan;
use App\User;
use Illuminate\Console\Command;

class AddMonthPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:month {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Monthly Payment for all staff';

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
        $userId = $this->argument('user_id');

        $users = User::select("id", "studio_id", "payment_id", "payment_day", "payment_amount", "payment_percentage")->where("is_active", "0")->whereNotNull('payment_day')->whereNotNull('payment_percentage');

        if ($userId != "") {
            $users = $users->where("id", $userId);
        }

        $users = $users->get();

        foreach ($users as $key => $user) {

            $paymentDays = explode(",", $user->payment_day);
            $perceVal    = json_decode($user->payment_percentage, true);

            if (count($paymentDays) > 0) {
                $type = 'staff';

                if ($user->role_id == "4") {
                    $type = "model";
                }

                $emiAmount = 0.00;

                $loans = SalaryLoan::where("user_id", $user->id)->where("status", "approved")->where("payment_status", "paid")->whereNotNull("transaction_id")->get();

                $loanDesc = "";
                if ($loans) {
                    foreach ($loans as $key => $loan) {
                        $emiAmount += round($loan->emi_amount / count($paymentDays), 2);
                        $loanDesc .= "$emiAmount As loan EMI ";
                    }
                }

                foreach ($paymentDays as $dayId => $day) {
                    $amount = 0.00;

                    $percentage = (isset($perceVal["$day"]) ? $perceVal["$day"] : 0.00);

                    if (isset($user->payment_amount) && $user->payment_amount != "") {
                        $amount = (($user->payment_amount * $percentage) / 100);
                    }

                    $payment                      = new Payment();
                    $payment->user_id             = $user->id;
                    $payment->studio_id           = $user->studio_id;
                    $payment->amount              = ($amount - $emiAmount);
                    $payment->emi_amount          = $emiAmount;
                    $payment->total_amount        = $amount;
                    $payment->status              = "pending";
                    $payment->payment_description = date("M") . " Monthly Payment Installment $loanDesc";
                    $payment->payment_type        = $type;
                    $payment->is_early_payment    = false;
                    $payment->date                = date("Y-m-$day");
                    $payment->time                = date("H:i:s");
                    $payment->save();
                }
            }
        }
    }
}
