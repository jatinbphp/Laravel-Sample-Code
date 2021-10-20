<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header serviceRequestList">
        <h4 class="k-h4">
            {{trans('message.services')}} {{trans('message.orders')}}
        </h4>
        @if($userType == 'superAdmin')
            @include("layouts.common.multiple_action",['modalType' =>'serviceRequest','ac'=>['delete','download','admin_accept']])
        @endif

        @if($userType == 'spacesAdmin' || $userType == 'trainingAdmin')
            @include("layouts.common.multiple_action",['type' =>'serviceRequest','ac'=>['accept','download']])
        @endif
        <div class="model-block-row"></div>
    </div>

    <div class="table-block table-block-new">
        <table class="striped table-loader highlight" id="serviceRequestList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>

                    @foreach(getServiceRequestFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="ServiceRequest" data-type="action-bar">
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


<form id="form-service-request-filter" name="form-service-request-filter">
    <input type="hidden"  class="resetServiceRequest agencyName" id="agencyName">
    <input type="hidden"  class="resetServiceRequest studioName" id="studioName">
    <input type="hidden"  class="resetServiceRequest modelName" id="modelName">
    <input type="hidden"  class="resetServiceRequest modelEmail" id="modelEmail">
    <input type="hidden"  class="resetServiceRequest broadCastAdmin" id="broadCastAdmin">
    <input type="hidden"  class="resetServiceRequest superAdmin" id="superAdmin">
    <input type="hidden"  class="resetServiceRequest roleName" id="roleName">
    <input type="hidden"  class="resetServiceRequest contractId" id="contractId" value="{{$contractId}}">
</form>
