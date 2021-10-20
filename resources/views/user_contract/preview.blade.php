<form id="form-send-user-contract" name="form-send-user-contract" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">

  <div class="row">
    <div class="input-field col s3 k-input-text">
      <label for="name3">
        {{trans('message.user')}} {{trans('message.email')}}<span>*</span>
      </label>
      <input id="name" name="email" type="email" class="validate k-txt-box" value="{{$userEmail}}">
      <span class="error k-error" id="email_error"></span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <div id="sendContractContent">
        @if(isset($mailContent))
          {!! stripslashes(str_replace("\\", '',$mailContent)) !!}
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon userContractSent" type="submit" data-id="{{$contractId}}">
          <i class="material-icons" style="padding-right:7px">send</i>  {{trans('message.send')}} {{trans('message.user')}} {{trans('message.contract')}}
        </button>
      </div>
    </div>
  </div>
</form>
