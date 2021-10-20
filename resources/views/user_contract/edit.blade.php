<form id="form-edit-user-contract" name="form-edit-user-contract" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <input id="contract_no" name="contract_no" type="hidden" class="validate numeric k-txt-box contractTag" data-tag="CONTRACT_NO" value="{{sprintf('%04s',$contract->contract_no)}}" readonly="readonly">
  <div class="row">
    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.template')}} <span>*</span>
      </label>
      <select id="template_id" name="template_id" class="contractTemplate loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @if(isset($contract))
            @foreach(getContractTemplate("role_id",$contract->role_id) as $templateId => $templateName)
              <option value="{{$templateId}}" data-badge="" @if(isset($contract) && $templateId == $contract->template_id) selected='selected' @endif>{{$templateName}}</option>
            @endforeach
          @endif
      </select>
      <span class="error k-error" id="template_id_error">
      </span>
    </div>

    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.start')}} {{trans('message.date')}} <span>*</span>
      </label>
      <input id="name" name="contract_start_date" type="text" class="validate pastFutureDatePicker k-txt-box contractTag" @if(isset($contract)) value="{{$contract->contract_start_date}}" @endif data-tag="CONTRACT_START_DATE">
      <span class="error k-error" id="contract_start_date_error">
      </span>
    </div>

    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.end')}} {{trans('message.date')}} <span>*</span>
      </label>
      <input id="name" name="contract_end_date" type="text" class="validate futureYearDatePicker k-txt-box contractTag" @if(isset($contract)) value="{{$contract->contract_end_date}}" @endif data-tag="CONTRACT_END_DATE">
      <span class="error k-error" id="contract_end_date_error">
      </span>
    </div>

    <div class="input-field col s2 k-input-text">
      <label for="name3">
        {{trans('message.send_mail')}}
      </label>
      <div class="switch k-switch k-switch-green">
        <label>
          <input type="checkbox" value="1" name="is_send_mail" id="is_send_mail" class="isSendMail" @if(isset($contract) && $contract->is_send_mail == '1') checked='checked' @endif>
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
          @foreach($signatureAdmins as $userId => $user)
            <option value="{{$userId}}" data-badge="" @if(isset($contract) && $userId == $contract->signature_user_id) selected='selected' @endif>{{$user}}</option>
          @endforeach
        </select>
        <span class="error k-error" id="signature_user_id_error">
        </span>
    </div>
  </div>
  <div class="row templateData">
      @include("user_contract.template")
  </div>
  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="ml-4  btn k-button-fill k-btn   action-btn updateUserContract" name="action" type="submit" data-id="{{$contract->id}}">
          <img src="{{asset('img/edit.png')}}" alt="">
          {{trans('message.update')}} {{trans('message.user')}} {{trans('message.contract')}}
        </button>
      </div>
    </div>
  </div>
</form>
