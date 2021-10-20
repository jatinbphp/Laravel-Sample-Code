<div id="modal-user-contract" class="modalx bottom-sheet hidden modal-custom modalUserContract">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.user')}} {{trans('message.contract')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="UserContract" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-user-contract">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<div id="service-request-modal" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">
            {{trans('message.add')}} {{trans('message.service')}} {{trans('message.request')}}
        </h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="ServiceRequest" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="service-request-close">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>

<div id="modal-user-contract-document" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.legal')}} {{trans('message.document')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="UserContractDocument" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-user-contract-document">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="form-user-contract" name="form-user-contract">
    <input type="hidden"  class="resetUserContract agencyName" id="agencyName">
    <input type="hidden"  class="resetUserContract studioName" id="studioName">
    <input type="hidden"  class="resetUserContract roleName" id="roleName">
    <input type="hidden"  class="resetUserContract templateName" id="templateName">
    <input type="hidden"  class="resetUserContract userName" id="userName">
    <input type="hidden"  class="resetUserContract statusFilter" id="statusFilter">
    <input type="hidden"  class="resetUserContract signFilter" id="signFilter">
    <input type="hidden"  class="resetUserContract contractStartDate" id="contractStartDate">
    <input type="hidden"  class="resetUserContract contractEndDate" id="contractEndDate">
    <input type="hidden"  class="resetUserContract dataTable" id="dataTable">
</form>
