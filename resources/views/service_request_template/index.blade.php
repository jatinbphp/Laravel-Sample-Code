<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header serviceRequestTemplate">
        <h4 class="k-h4">{{trans('message.service')}} {{trans('message.order')}} {{trans('message.templates')}}</h4>
        @include("layouts.common.multiple_action",['type' =>'serviceRequestTemplate','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped table-loader highlight" id="serviceRequestTemplate" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getServiceRequestTemplateFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="EmailTemplate" data-type="action-bar">
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

<div id="modal-service-request-template" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.service')}} {{trans('message.order')}} {{trans('message.template')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="serviceRequestTemplate" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-service-request-template">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>
<form id="form-service-request-template-filter" name="form-service-request-template-filter">
    <input type="hidden"  class="resetServiceRequestTemplate agencyName" id="agencyName">
    <input type="hidden"  class="resetServiceRequestTemplate studioName" id="studioName">
    <input type="hidden"  class="resetServiceRequestTemplate roleName" id="roleName">
    <input type="hidden"  class="resetServiceRequestTemplate templateName" id="templateName">
    <input type="hidden"  class="resetServiceRequestTemplate templateStatus" id="templateStatus">
</form>

@push('js')
<script src="{{ asset('js/superadmin/service_request_template.js')}}"></script>
@endpush
