<form id="form-add-email-template" name="form-add-email-template" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    @if ($userRoleName == "Super Admin")
      <div class="input-field col s3 k-dropdown">
        <label for="name3">
          {{trans('message.agency')}} <span>*</span>
        </label>
        <select id="agency_id" name="agency_id" class="superAdminAgency loadSelect">
            <option value="">{{trans('message.select')}}</option>
            @foreach(getAgency() as $agencyId => $agency)
              <option value="{{$agencyId}}" data-badge="" @if(isset($emailTemp) && $agencyId == $emailTemp->agency_id) selected='selected' @endif>{{$agency}}</option>
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
        <select id="studio_id" name="studio_id" class="superAdminStudio loadSelect">
            <option value="">{{trans('message.select')}}</option>
            @if(isset($emailTemp))
              @foreach(getStudioByAgencyId($emailTemp->agency_id) as $studioId => $studio)
                <option value="{{$studioId}}" data-badge="" @if(isset($emailTemp) && $studioId == $emailTemp->studio_id) selected='selected' @endif>{{$studio}}</option>
              @endforeach
            @elseif($userRoleName == "Agency Admin")
              @foreach(getStudioByAgencyId($user->agency_id) as $studioId => $studio)
                <option value="{{$studioId}}" data-badge="" @if(isset($emailTemp) && $studioId == $emailTemp->studio_id) selected='selected' @endif>{{$studio}}</option>
              @endforeach
            @endif
        </select>
        <span class="error k-error" id="studio_id_error">
        </span>
      </div>
    @endif

    <div class="input-field col s3 k-input-text">
      <label for="name3">
        {{trans('message.template')}} {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($emailTemp)) value="{{$emailTemp->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.status')}} <span>*</span>
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getStatusByRole() as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if(isset($emailTemp) && $statusId == $emailTemp->is_active) selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <label for="name3">
        {{trans('message.template')}} {{trans('message.content')}} <span>*</span>
      </label>
      <textarea class="materialize-textarea k-textarea" name="template_content" rows="2" id="emailTemplate">
        @if(isset($emailTemp))
          {!! stripslashes(str_replace("\\", '', $emailTemp->template_content)) !!}
        @endif
      </textarea>
      <span class="error k-error" id="template_content_error">
      </span>
      <!-- <textarea class="materialize-textarea k-textarea" name="template_fields" rows="2" id="template_fields" data-type="emailTemplate">
        @if(isset($emailTemp))
          {{$emailTemp->template_fields}}
        @endif
      </textarea>
      <span class="error p-0 k-error" id="template_fields_error">
      </span> -->
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($emailTemp))
          <button class="ml-4  btn k-button-fill k-btn   action-btn updateEmailTemplate" name="action" type="submit" data-id="{{$emailTemp->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{trans('message.update')}} {{trans('message.email')}} {{trans('message.template')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon saveEmailTemplate" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.email')}} {{trans('message.template')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
