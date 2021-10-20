<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header studioAdminList">
        <h4 class="k-h4">
            <span class="multiBread hidden">
                @if($userType == 'superAdmin')
                    <a id="breadAgencyName">
                        {{trans('message.agency')}}
                    </a>
                    <i class="material-icons materialIcons">keyboard_arrow_right</i>
                @endif
                @if($userType == 'superAdmin' || $userType == 'agencyAdmin')
                    <a id="breadStudioName">
                        {{trans('message.studio')}}
                    </a>
                    <i class="material-icons materialIcons">keyboard_arrow_right</i>
                @endif
            </span>
            @if(isset($myTitle))
                {{$myTitle}}
            @else
                {{trans('message.users')}}
            @endif
        </h4>
        @include("layouts.common.multiple_action",['type' =>'studioAdmin','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped table-loader highlight" id="studioAdminList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getStudioAdminFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="StudioAdmin" data-type="action-bar">
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

@include("studio_admin.modal")

<form id="form-studio-admin-filter" name="form-studio-admin-filter">
    <input type="hidden"  class="resetStudioAdminFilter studioName" id="studioName">
    <input type="hidden"  class="resetStudioAdminFilter agencyName" id="agencyName">
    <input type="hidden"  class="resetStudioAdminFilter studioAdminName" id="studioAdminName">
    <input type="hidden"  class="resetStudioAdminFilter studioAdminEmail" id="studioAdminEmail">
    <input type="hidden"  class="resetStudioAdminFilter studioAdminPhone" id="studioAdminPhone">
    <input type="hidden"  class="resetStudioAdminFilter studioAdminStatus" id="studioAdminStatus">
    <input type="hidden"  class="impersonate" id="impersonate" value="yes">
</form>
