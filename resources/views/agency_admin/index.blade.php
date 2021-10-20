<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header agencyAdmin">
        <h4 class="k-h4">
            <span class="multiBread hidden">
                <a id="breadAgencyName">
                    {{trans('message.agency')}}
                </a>
                <i class="material-icons materialIcons">keyboard_arrow_right</i>
            </span>
            @if(isset($myTitle))
                {{$myTitle}}
            @else
                {{trans('message.users')}}
            @endif
        </h4>
        @include("layouts.common.multiple_action",['type' =>'agencyAdmin','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped highlight" id="agencyAdmin" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getAgencyAdminFields() as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                            <a id="" class="delete-icon showHelpQue" data-module="AgencyAdmin" data-type="action-bar">
                                <i class="material-icons">help</i>
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

@include('agency_admin.modal')

<form id="form-agency-admin-filter" name="form-agency-admin-filter">
    <input type="hidden"  class="resetAgencyAdminFilter agencyName" id="agencyName">
    <input type="hidden"  class="resetAgencyAdminFilter agencyAdminName" id="agencyAdminName">
    <input type="hidden"  class="resetAgencyAdminFilter agencyAdminEmail" id="agencyAdminEmail">
    <input type="hidden"  class="resetAgencyAdminFilter agencyAdminPhone" id="agencyAdminPhone">
    <input type="hidden"  class="resetAgencyAdminFilter agencyAdminStatus" id="agencyAdminStatus">
    <input type="hidden"  class="resetAgencyFilter impersonate" id="impersonate" value="yes">
</form>
