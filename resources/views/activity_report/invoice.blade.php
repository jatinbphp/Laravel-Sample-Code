<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header activityInvoiceList">
        <h4 class="k-h4">
            {{trans('message.activity')}} {{trans('message.invoice')}}
        </h4>
        @include("layouts.common.multiple_action",['type' =>'activityInvoice','ac'=>['invoice_pdf'],'userType'=> $userType])
        <div class="model-block-row">
        </div>
    </div>
    <div class="table-block table-block-new">
        <table class="striped highlight" id="activityInvoiceList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label class=" k-checkbox-fill">
                            <input class="filled-in main_checkbox" type="checkbox"/>
                            <span class="">
                            </span>
                        </label>
                    </th>
                    @foreach(getActivityReportFields($userType) as $fieldId => $val)
                    <th class="center">
                        {{$val}}
                            @if($val == trans('message.actions'))
                        <a class="delete-icon showHelpQue" data-module="ActivityReport" data-type="action-bar" id="">
                            <i class="material-icons">
                                help
                            </i>
                        </a>
                        @endif
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


<form id="form-activity-invoice-filter" name="form-activity-invoice-filter">
<input class="resetActivityInvoice agencyName" id="agencyName" type="hidden" />
<input class="resetActivityInvoice studioName" id="studioName" type="hidden" />
<input class="resetActivityInvoice roleName" id="roleName" type="hidden" />
<input class="resetActivityInvoice invoiceNo" id="invoiceNo" type="hidden" />
<input class="resetActivityInvoice activityDate" id="activityDate" type="hidden" />
<input class="resetActivityInvoice activityStatus" id="activityStatus" type="hidden" />
</form>
