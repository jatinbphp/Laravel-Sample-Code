<form id="form-add-service-request" name="form-add-service-request" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">

   @if($userRoleName != "Spaces Admin" && $userRoleName != "Training Admin")
    <div class="row">
      <div class="input-field col s4 k-dropdown">
        <label for="name3">
          {{trans('message.service')}} {{trans('message.order')}} {{trans('message.admin')}} <span>*</span>
        </label>
        <select id="user_id" name="user_id" class="broadCastAdmin signatureStudioAdmin loadSelect">
            <option value="">{{trans('message.select')}}</option>
            @foreach($final as $adminId => $user)
              <option value="{{$adminId}}" data-icon="{{$user['avatar']}}" @if(isset($serviceRequest) && $adminId == $serviceRequest->user_id) selected='selected' @endif>{{$user['name']}}</option>
            @endforeach
        </select>
        <span class="error k-error" id="user_id_error">
        </span>
        <span class="error k-error" id="signature_missing_error">
                      </span>
      </div>

      @if($userRoleName == "Super Admin")
        <div class="input-field col s4 k-dropdown">
          <label for="name3">
            {{trans('message.super')}} {{trans('message.admin')}} <span>*</span>
          </label>
          <select id="over_by_user_id" name="over_by_user_id" class="loadSelect">
              <option value="">{{trans('message.select')}}</option>
              @foreach(getAllUserByRole('1') as $adminId => $user)
                <option value="{{$adminId}}" @if(isset($serviceRequest) && $adminId == $serviceRequest->over_by_user_id) selected='selected' @endif>{{$user}}</option>
              @endforeach
          </select>
          <span class="error k-error" id="over_by_user_id_error">
          </span>
        </div>
      @endif
    </div>
  @endif

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <div id="requestContent">
        @if(isset($serviceRequestContent))
          {!! stripslashes(str_replace("\\", '',$serviceRequestContent)) !!}
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="ml-4  btn k-button-fill k-btn   action-btn submitServiceRequest" name="action" type="submit" data-id="{{$serviceRequest->id}}">
          <img src="{{asset('img/edit.png')}}" alt="">
          {{trans('message.accept')}} {{trans('message.service')}} {{trans('message.order')}}
        </button>
      </div>
    </div>
  </div>
</form>
