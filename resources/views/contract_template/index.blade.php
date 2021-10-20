<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header contractTemplateList">
        <h4 class="k-h4">{{trans('message.contract')}} {{trans('message.templates')}}</h4>
        @include("layouts.common.multiple_action",['type' =>'contractTemplate','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block table-block-new">
        <table class="striped highlight table-loader" id="contractTemplateList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getContractTemplateFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="ContractTemplate" data-type="action-bar">
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

<div id="modal-contract-template" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.contract')}} {{trans('message.template')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="contractTemplate" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-contract-template">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="form-contract-template-filter" name="form-contract-template-filter">
    <input type="hidden"  class="resetContractTemplate agencyName" id="agencyName">
    <input type="hidden"  class="resetContractTemplate studioName" id="studioName">
    <input type="hidden"  class="resetContractTemplate roleName" id="roleName">
    <input type="hidden"  class="resetContractTemplate templateName" id="templateName">
    <input type="hidden"  class="resetContractTemplate templateStatus" id="templateStatus">
    <input type="hidden"  class="resetContractTemplate signatureAdmin" id="signatureAdmin">
</form>

@push('js')
<script src="{{ asset('js/superadmin/contract_template.js')}}"></script>
@endpush
