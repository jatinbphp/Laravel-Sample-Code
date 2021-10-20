<?php

namespace App\Console\Commands;

use App\Notification;
use App\Payment;
use App\SalaryLoan;
use App\User;
use App\Utility\PaymentApiClient;
use Illuminate\Console\Command;

class AddPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Authorized Payment which is Approved';

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
        $this->scheduledPayment();
        //approvePayment();
    }

    /**
     * [scheduledPayment description]
     * @return [type] [description]
     */
    public function scheduledPayment()
    {
        $date           = date("Y-m-d");
        $paymentPending = Payment::where("status", "scheduled")->where("approve_status", "0")->where("date", $date)->whereNull("transaction_id")->get();

        if ($paymentPending) {
            foreach ($paymentPending as $key => $payment) {

                $toEmail      = $payment->user->payment_id;
                $amount       = $payment->amount;
                $currency     = "USD";
                $note         = $payment->payment_description;
                $firstName    = $payment->user->name;
                $lastName     = "";
                $businessName = "";

                $reference = "";

                $paymentApiClient = new PaymentApiClient("doriana.kendra@gmail.com", "37a749d808e46495a8da1e5352d03cae");

                $res = $paymentApiClient->transferFunds(
                    $toEmail, "1.55", $currency, $note, $firstName, $lastName, $businessName, $reference);

                $paymentResponse = simplexml_load_string($res);

                $paymentResponse = json_encode($paymentResponse);

                $paymentResponse = json_decode($paymentResponse, true);

                if ($paymentResponse['Environment'] == "PRODUCTION" && $paymentResponse['ResponseCode'] == "00" && $paymentResponse['ResponseDescription'] == "Approved or Completed Successfully") {

                    $payment->transaction_id = $paymentResponse['TransactionId'];
                    $payment->status         = "paid";
                    $payment->save();

                    if ($payment->is_loan_payment == "1") {
                        $loan                 = SalaryLoan::find($payment->loan_id);
                        $loan->transaction_id = $paymentResponse['TransactionId'];
                        $loan->payment_status = "paid";
                        $loan->save();
                    }

                    $notification              = new Notification();
                    $notification->name        = $payment->user->real_name;
                    $notification->description = "Your get payment for $" . $payment->amount . " Successfully";
                    $notification->group_id    = null;
                    $notification->user_id     = $payment->user_id;
                    $notification->save();
                }
            }
        }
    }

    /**
     * [approvePayment description]
     * @return [type] [description]
     */
    public function approvePayment()
    {
        $paymentPending = Payment::whereNull("status")->where("approve_status", "0")->whereNull("transaction_id")->get();

        if ($paymentPending) {
            foreach ($paymentPending as $key => $payment) {

                $toEmail      = $payment->user->payment_id;
                $amount       = $payment->amount;
                $currency     = "USD";
                $note         = $payment->payment_description;
                $firstName    = $payment->user->name;
                $lastName     = "";
                $businessName = "";

                $reference = "";

                $paymentApiClient = new PaymentApiClient("doriana.kendra@gmail.com", "37a749d808e46495a8da1e5352d03cae");
                $res              = $paymentApiClient->transferFunds(
                    $toEmail, $amount, $currency, $note, $firstName, $lastName, $businessName, $reference);

                $paymentResponse = simplexml_load_string($res);

                $paymentResponse = json_encode($paymentResponse);

                $paymentResponse = json_decode($paymentResponse, true);

                if ($paymentResponse['Environment'] == "PRODUCTION" && $paymentResponse['ResponseCode'] == "00" && $paymentResponse['ResponseDescription'] == "Approved or Completed Successfully") {

                    $payment->transaction_id = $paymentResponse['TransactionId'];
                    $payment->status         = "paid";
                    $payment->save();

                    $notification              = new Notification();
                    $notification->name        = $payment->user->real_name;
                    $notification->description = "Your get payment for $" . $payment->amount . " Successfully";
                    $notification->group_id    = null;
                    $notification->user_id     = $payment->user_id;
                    $notification->save();
                }
            }
        }
    }
}
