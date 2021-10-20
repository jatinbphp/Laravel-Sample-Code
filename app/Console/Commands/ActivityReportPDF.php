<?php

namespace App\Console\Commands;

use App\Models\ActivityReport;
use App\Models\ActivityReportTemplate;
use App\Models\InvoiceTemplate;
use App\Models\Studio;
use App\Models\User;
use Illuminate\Console\Command;

class ActivityReportPDF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activity:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Activity Report PDF';

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
        $invoiceDirectory = "invoice";
        $invoicePath      = storage_path("app/public/activity_report");
        makeDir($invoicePath, true);

        $activityReports = ActivityReport::where("status", "accepted")->whereNull("activity_pdf_path")->whereNull("invoice_pdf_path")->get();

        $defaultInvoiceTemplate = InvoiceTemplate::where("is_active", "default")->first();

        $defaultActivityTemplate = ActivityReportTemplate::where("is_active", "default")->first();

        foreach ($activityReports as $key => $activityReport) {

            $activityList = json_decode($activityReport->service_information, true);

            $studio = Studio::where("id", $activityReport->studio_id)->first();

            $logo = "<img src='" . $studio->logo . "' height='100px' width='200px'/>";

            $invoiceTemplate = InvoiceTemplate::withoutGlobalScope(StudioActiveScope::class)->where("studio_id", $activityReport->studio_id)->where("is_active", "0")->first();

            $invoiceContent = $defaultInvoiceTemplate->template_content;
            if (isset($invoiceTemplate)) {
                $invoiceContent = $invoiceTemplate->template_content;
            }

            $activityContent = $defaultActivityTemplate->template_content;
            if (isset($activityTemplate)) {
                $activityContent = $activityTemplate->template_content;
            }

            $reportActivity = "";

            if (isset($activityList)) {
                foreach ($activityList as $key => $activity) {
                    $reportActivity .= '<tr>
                        <td>' . $activity['activity_name'] . '</td>
                        <td>' . $activityReport->currency . number_format($activity['price_per_hour']) . '</td>
                        <td>' . $activity['working_hours'] . '</td>
                        <td>' . $activityReport->currency . number_format($activity['total_amount']) . '</td>
                    </tr>';
                }
            }

            $billingFromAddress      = $billingToAddress      = "";
            $billingFromCompanyName  = $billingToCompanyName  = "";
            $billingFromCompanyEmail = $billingToCompanyEmail = "";
            $billingFromCompanyPhone = $billingToCompanyPhone = "";

            $discountAmt = 0.00;

            if ($activityReport->discount > 0) {
                $discountAmt = $activityReport->discount;
            }

            $discountPer = 0.00;

            if ($activityReport->discount_percentage > 0) {
                $discountPer = $activityReport->discount_percentage;
            }

            if ($activityReport->admin_id != "") {

                $billingFrom = User::select("company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone")->where("id", $activityReport->admin_id)->first();

                if ($billingFrom) {
                    $billingFromAddress      = $billingFrom->company_address . " " . $billingFrom->city . " " . $billingFrom->company_state . " " . $billingFrom->company_country;
                    $billingFromCompanyName  = $billingFrom->company_name;
                    $billingFromCompanyEmail = $billingFrom->company_email;
                    $billingFromCompanyPhone = $billingFrom->company_phone;
                }
            }

            if ($activityReport->super_admin_id != "") {

                $billingTo = User::select("company_name", "company_register_no", "company_address", "company_city", "company_state", "company_country", "company_email", "company_phone")->where("id", $activityReport->super_admin_id)->first();

                if ($billingTo) {
                    $billingToAddress      = $billingTo->company_address . " " . $billingTo->city . " " . $billingTo->company_state . " " . $billingTo->company_country;
                    $billingToCompanyName  = $billingTo->company_name;
                    $billingToCompanyEmail = $billingTo->company_email;
                    $billingToCompanyPhone = $billingTo->company_phone;
                }
            }

            $reportActivityHtml = '<tr><td colspan="4" align="center">~activity_list~</td></tr>';

            $content = stripslashes(str_replace(["\\", "\&quot;", "~invoice_no~", "~issue_date~", "~due_date~", "~studio_logo~", "~company_from_name~", "~company_from_address~", "~company_from_email~", "~company_from_phone_no~", "~company_to_name~", "~company_to_address~", "~company_to_email~", "~company_to_phone_no~", $reportActivityHtml, "~currency~", "~sub_total~", "~discount_value~", "~discount_percentage~", "~total~"], ['', '', sprintf("%04s", $activityReport->invoice_no), $activityReport->billing_date, $activityReport->billing_due_date, $logo, $billingFromCompanyName, $billingFromAddress, $billingFromCompanyEmail, $billingFromCompanyPhone, $billingToCompanyName, $billingToAddress, $billingToCompanyEmail, $billingToCompanyPhone, $reportActivity, $activityReport->currency, number_format($activityReport->sub_total), number_format($discountAmt, 2), number_format($discountPer, 2), number_format($activityReport->total)], $invoiceContent));

            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadView('activity_report.pdf', compact('content', 'pdf'));
            $invoicePDF = getUniqueFileName() . ".pdf";
            $pdf->save($invoicePath . '/' . $invoicePDF);
            $activityReport->invoice_pdf_path = $invoicePDF;

            $content = stripslashes(str_replace(["\\", "\&quot;", "~invoice_no~", "~issue_date~", "~due_date~", "~studio_logo~", "~company_from_name~", "~company_from_address~", "~company_from_email~", "~company_from_phone_no~", "~company_to_name~", "~company_to_address~", "~company_to_email~", "~company_to_phone_no~", $reportActivityHtml, "~currency~", "~sub_total~", "~discount_value~", "~discount_percentage~", "~total~"], ['', '', sprintf("%04s", $activityReport->activity_no), $activityReport->billing_date, $activityReport->billing_due_date, $logo, $billingFromCompanyName, $billingFromAddress, $billingFromCompanyEmail, $billingFromCompanyPhone, $billingToCompanyName, $billingToAddress, $billingToCompanyEmail, $billingToCompanyPhone, $reportActivity, $activityReport->currency, number_format($activityReport->sub_total), number_format($discountAmt, 2), number_format($discountPer, 2), number_format($activityReport->total)], $activityContent));

            $pdf1 = app('dompdf.wrapper');
            $pdf1->getDomPDF()->set_option("enable_php", true);
            $pdf1->loadView('activity_report.pdf', compact('content', 'pdf'));
            $activityPDF = getUniqueFileName() . ".pdf";
            $pdf1->save($invoicePath . '/' . $activityPDF);
            $activityReport->activity_pdf_path = $activityPDF;

            $activityReport->save();
        }

        return 0;
    }
}
