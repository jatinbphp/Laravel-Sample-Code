<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header activityReportList">
        <h4 class="k-h4">
            {{trans('message.invoices')}}
        </h4>
        @include("layouts.common.multiple_action",['type' =>'activityReport','ac'=>['delete','activity_accept','download_all_AR','print_all_AR'],'userType'=> $userType])
        <div class="model-block-row">
        </div>
    </div>
    <div class="table-block table-block-new">
        <table class="striped table-loader highlight" id="activityReportList" style="width:100%">
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

<div class="modalx bottom-sheet hidden modal-custom" id="modal-activity-report">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">
            {{trans('message.add')}} {{trans('message.activity')}} {{trans('message.report')}}
        </h4>
        <div class="buttons-group">
            <a class="delete-icon showHelpQue" data-module="ActivityReport" data-type="add-update" id="">
                <i class="material-icons">
                    help
                </i>
            </a>
            <a class="close-activity-report" href="#">
                <img alt="" src="{{asset('img/icon-close.png')}}">
                </img>
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>

<div class="modalx bottom-sheet hidden modal-custom" id="modal-activity-invoice">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">
            {{trans('message.view')}} {{trans('message.invoice')}}
        </h4>
        <div class="buttons-group">
            <a class="delete-icon showHelpQue" data-module="ActivityReport" data-type="add-update" id="">
                <i class="material-icons">
                    help
                </i>
            </a>
            <a class="close-activity-invoice" href="#">
                <img alt="" src="{{asset('img/icon-close.png')}}">
                </img>
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>

<form id="form-activity-report-filter" name="form-activity-report-filter">
<input class="resetActivityReport agencyName" id="agencyName" type="hidden" />
<input class="resetActivityReport studioName" id="studioName" type="hidden" />
<input class="resetActivityReport roleName" id="roleName" type="hidden" />
<input class="resetActivityReport invoiceNo" id="invoiceNo" type="hidden" />
<input class="resetActivityReport activityDate" id="activityDate" type="hidden" />
<input class="resetActivityReport activityStatus" id="activityStatus" type="hidden" />
</form>

@push('js')
<script src="{{ asset('js/superadmin/activity_report.js')}}"></script>
@endpush
