@if($type == "agency_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.agency')}}:
  </span>
  <select class="js-select2 saveSelect2Data agencyFilter" id="agencyFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getAgency() as $agencyId => $agency)
    <option value="{{$agencyId}}" data-badge="" @if(isset($value) && in_array($agencyId,explode(",",$value))) selected='selected' @endif>{{$agency}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="agency_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "studio_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.studio')}} :
  </span>
  <select class="js-select2 saveSelect2Data studioFilter" id="studioFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getStudio() as $studioId => $studio)
    <option value="{{$studioId}}" data-badge="" @if(isset($value) && in_array($studioId,explode(",",$value))) selected='selected' @endif>{{$studio}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="studio_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "name_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.name')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control nameFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="name_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "email_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.email')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control emailFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="email_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "city_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.city')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control cityFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="city_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "state_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.state')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control stateFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="state_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "country_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.country')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control countryFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="country_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "pin_code_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.pin_code')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control pinCodeFilter numeric textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="pin_code_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "phone_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.phone')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="title" class="form-control phoneFilter textbox-filter-innner saveKeyUpData" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="phone_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "status_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.status')}} :
  </span>
  <select class="js-select2 saveSelect2Data statusFilter" id="statusFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getUserStatus() as $statusId => $status)
    <option value="{{$statusId}}" data-badge="" @if(isset($value) && in_array($statusId,explode(",",$value))) selected='selected' @endif>{{$status}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="status_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "status_default_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.status')}} :
  </span>
  <select class="js-select2 saveSelect2Data statusFilter" id="statusFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getStatusByRole() as $statusId => $status)
    <option value="{{$statusId}}" data-badge="" @if(isset($value) && in_array($statusId,explode(",",$value))) selected='selected' @endif>{{$status}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="status_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "role_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.role')}} :
  </span>
  <select class="js-select2 saveSelect2Data roleFilter" id="roleFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getContractRole() as $roleId => $role)
    <option value="{{$roleId}}" data-badge="" @if(isset($value) && in_array($roleId,explode(",",$value))) selected='selected' @endif>{{$role}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="role_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "role_request_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.role')}} :
  </span>
  <select class="js-select2 saveSelect2Data roleFilter" id="roleFilter" data-type="{{$type}}" multiple="multiple">
    @foreach(getStudioRole() as $roleId => $role)
    <option value="{{$roleId}}" data-badge="" @if(isset($value) && in_array($roleId,explode(",",$value))) selected='selected' @endif>{{$role}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="role_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "admin_contract_template")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.template')}} :
  </span>
  <select class="js-select2 saveSelect2Data contractTemplateDropdown" id="contractTemplateDropdown" data-type="{{$type}}" multiple="multiple">
    @foreach(getContractTemplate() as $templateId => $template)
    <option value="{{$templateId}}" data-badge="" @if(isset($value) && in_array($templateId,explode(",",$value))) selected='selected' @endif>{{$template}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="admin_contract_template" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "admin_contract_user")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.user')}} :
  </span>
  <select class="js-select2 saveSelect2Data contractUserDropdown" id="contractUserDropdown" data-type="{{$type}}" multiple="multiple">
    @foreach(getContractRoles() as $roleId => $role)
    <optgroup label="{{$role}}">
      @foreach(getContractUserByRole($roleId) as $userId => $user)
        <option value="{{$userId}}" data-badge="" @if(isset($value) && in_array($userId,explode(",",$value))) selected='selected' @endif>{{$user}}</option>
      @endforeach
    </optgroup>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="admin_contract_user" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "admin_contract_status")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.status')}} :
  </span>
  <select class="js-select2 saveSelect2Data userContractSignStatus" id="userContractSignStatus" data-type="{{$type}}" multiple="multiple">
    @foreach(getContractStatus() as $statusId => $status)
    <option value="{{$statusId}}" data-badge="" @if(isset($value) && in_array($statusId,explode(",",$value))) selected='selected' @endif>{{$status}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="admin_contract_status" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "admin_contract_start_date")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.start')}} {{trans('message.date')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="date"  class="form-control contractStartDate datePickerFilter Date textbox-filter-innner saveSelect2Data" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="admin_contract_start_date" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "admin_contract_end_date")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.end')}} {{trans('message.date')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="date"  class="form-control contractEndDate datePickerFilter Date textbox-filter-innner saveSelect2Data" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="admin_contract_end_date" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "broadcast_admin")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.admin')}} {{trans('message.user')}}:
  </span>
  <select class="js-select2 saveSelect2Data broadCastAdminDropdown" id="broadCastAdminDropdown" data-type="{{$type}}" multiple="multiple">
      @foreach(getStudio() as $studioId => $studio)
        <optgroup label="{{$studio}}">
          @foreach(getBroadCastAdminByStudio($studioId) as $userId => $user)
          <option value="{{$userId}}" data-badge="" @if(isset($value) && in_array($userId,explode(",",$value))) selected='selected' @endif>{{$user}}</option>
          @endforeach
        </optgroup>
      @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="broadcast_admin" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "real_name_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.real_name')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="model_name"  class="form-control realNameFilter textbox-filter-innner saveSelect2Data" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="real_name_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "signature_admin")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.signature')}} {{trans('message.admin')}}:
  </span>
  <select class="js-select2 saveSelect2Data signatureAdminFilter" id="signatureAdmin" data-type="{{$type}}" multiple="multiple">
    @foreach(getSignatureAdmin() as $userId => $user)
    <option value="{{$userId}}" data-badge="" @if(isset($value) && in_array($userId,explode(",",$value))) selected='selected' @endif>{{$user}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="signature_admin" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "invoice_no_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.invoice_no')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="invoice_no"  class="form-control invoiceNoFilter textbox-filter-innner saveSelect2Data numeric" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="invoice_no_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "activity_date_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.date')}} :
  </span>
  <a href="#" class="chip main-filter-component-btn k-button-border">
    <input type="text" name="invoice_no"  class="form-control datePickerFilter activityDateFilter textbox-filter-innner saveSelect2Data numeric" data-type="{{$type}}" @if(isset($value)) value="{{$value}}" @endif>
    <i class="{{$closeCls}} material-icons" data-type="activity_date_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "activity_status_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.status')}}:
  </span>
  <select class="js-select2 saveSelect2Data activityStatusFilter" id="activityStatus" data-type="{{$type}}" multiple="multiple">
    @foreach(['pending'=> trans('message.pending'),'accepted' => 'Accepted'] as $statusId => $status)
    <option value="{{$statusId}}" data-badge="" @if(isset($value) && in_array($statusId,explode(",",$value))) selected='selected' @endif>{{$status}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="activity_status_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif

@if($type == "super_admin_filter")
<div class="button-triggle-parent">
  <span class="modal-filter-add-btn">
    {{trans('message.super')}} {{trans('message.admin')}}:
  </span>
  <select class="js-select2 saveSelect2Data superAdminFilter" id="superAdminFilter" data-type="{{$type}}" multiple="multiple">
   @foreach(getAllUserByRole(1) as $adminId => $admin)
    <option value="{{$adminId}}" data-badge="" @if(isset($value) && in_array($adminId,explode(",",$value))) selected='selected' @endif>{{$admin}}</option>
    @endforeach
  </select>
  <a href="#" class="cleare-select-2-close">
    <i class="{{$closeCls}} material-icons" data-type="super_admin_filter" data-fields="{{$type}}">close</i>
  </a>
</div>
@endif
