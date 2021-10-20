<form id="form-add-user-contract" name="form-add-user-contract" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    @if ($userRoleName == "Super Admin")
      <div class="input-field col s3 k-dropdown">
        <label for="name3">
          {{trans('message.agency')}} <span>*</span>
        </label>
        <select id="agency_id" name="agency_id" class="superAdminAgency loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAgency() as $agencyId => $agency)
          <option value="{{$agencyId}}">{{$agency}}</option>
          @endforeach
        </select>
        <span class="error k-error" id="agency_id_error">
        </span>
      </div>
    @endif

    @if ($userRoleName == "Super Admin" || $userRoleName == "Agency Admin")
      <div class="input-field col s3 k-dropdown">
        <label for="name3">
          {{trans('message.studios')}} <span>*</span>
        </label>
        <select id="studio_id" name="studio_id" class="superAdminStudio userContractStudio loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @if(isset($contract))
            @foreach(getStudioByAgencyId($contract->agency_id) as $studioId => $studio)
              <option value="{{$studioId}}">{{$studio}}</option>
            @endforeach
          @elseif($userRoleName == "Agency Admin")
            @foreach(getStudioByAgencyId($user->agency_id) as $studioId => $studio)
                <option value="{{$studioId}}">{{$studio}}</option>
            @endforeach
          @endif
        </select>
        <span class="error k-error" id="studio_id_error">
        </span>
      </div>
    @endif

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.assign')}} {{trans('message.to')}} <span>*</span>
      </label>
      <select id="role_id" name="role_id" class="contractRole loadSelect" data-type="contractTemplate">
        <option value="">{{trans('message.select')}}</option>
        @foreach(getContractRole(true) as $roleId => $role)
        <option value="{{$roleId}}" @if(isset($contract) && $contract->role_id == $roleId) selected='selected' @endif>{{$role}}</option>
        @endforeach
      </select>
      <span class="error k-error" id="role_id_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.template')}} <span>*</span>
      </label>
      <select id="template_id" name="template_id" class="contractTemplate loadSelect">
        <option value="">{{trans('message.select')}}</option>
        @if(isset($contract))
        @foreach(getContractTemplate("role_id",$contract->role_id) as $templateId => $template)
        <option value="{{$templateId}}">{{$template}}</option>
        @endforeach
        @endif
      </select>
      <span class="error k-error" id="template_id_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s3 k-input-text">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.no')}}<span>*</span>
      </label>
      <input id="contract_no" name="contract_no" type="text" class="validate numeric k-txt-box contractTag userContractNo" data-tag="CONTRACT_NO" value="{{getContractNo()}}">
      <span class="error k-error" id="contract_no_error">
      </span>
    </div>

    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.start')}} {{trans('message.date')}} <span>*</span>
      </label>
      <input id="name" name="contract_start_date" type="text" class="validate pastFutureDatePicker k-txt-box contractTag" data-tag="CONTRACT_START_DATE" placeholder="Select From Date">
      <span class="error k-error" id="contract_start_date_error">
      </span>
    </div>
    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.end')}} {{trans('message.date')}} <span>*</span>
      </label>
      <input id="name" name="contract_end_date" type="text" class="validate futureYearDatePicker k-txt-box contractTag" data-tag="CONTRACT_END_DATE" placeholder="Select To Date">
      <span class="error k-error" id="contract_end_date_error">
      </span>
    </div>

    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.send_mail')}}
      </label>
      <div class="switch k-switch k-switch-green">
        <label>
          <input type="checkbox" value="1" name="is_send_mail" id="is_send_mail" class="isSendMail">
          <span class="lever"></span>
        </label>
      </div>
      <span class="error k-error" id="is_send_mail_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.signed_by')}}
      </label>
      <select id="signature_user_id" name="signature_user_id" class="signatureAdmin loadSelect">
        <option value="">{{trans('message.select')}}</option>
      </select>
      <span class="error k-error" id="signature_user_id_error">
      </span>
    </div>
  </div>

  <div class="row">

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.user')}} {{trans('message.type')}} <span>*</span>
      </label>
      <select id="user_type" name="user_type" class="superAdminUserType loadSelect">
        <option value="">{{trans('message.select')}}</option>
        @foreach(getUserType() as $typeId => $type)
        <option value="{{$typeId}}">{{$type}}</option>
        @endforeach
      </select>
      <span class="error k-error" id="user_type_error">
      </span>
    </div>

    <div class="newUser">
    </div>
  </div>

  <div class="templateData">
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon saveUserContract" type="submit">
          <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.user')}} {{trans('message.contract')}}
        </button>
      </div>
    </div>
  </div>
</form>
