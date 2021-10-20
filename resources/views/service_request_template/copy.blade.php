<form id="form-add-service-request-template" name="form-add-service-request-template" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
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

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.studios')}} <span>*</span>
      </label>
      <select id="studio_id" name="studio_id" class="superAdminStudio loadSelect">
          <option value="">{{trans('message.select')}}</option>
      </select>
      <span class="error k-error" id="studio_id_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.assing_to_user_type')}} <span>*</span>
      </label>
      <select id="role_id" name="role_id" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getStudioRole() as $roleId => $role)
            <option value="{{$roleId}}" @if(isset($requestTemplate) && $roleId == $requestTemplate->role_id) selected='selected' @endif>{{$role}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="role_id_error">
      </span>
    </div>

    <div class="input-field col s3 k-input-text">
      <label for="name3">
        {{trans('message.template')}} {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($requestTemplate)) value="{{$requestTemplate->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>

  </div>

  <div class="row">
    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.status')}} <span>*</span>
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getStatusByRole() as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if($statusId == 0) selected='selected' @endif>{{$status}}</option>
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
      <textarea class="materialize-textarea k-textarea" name="template_content" rows="2" id="requestTemplate">
        @if(isset($requestTemplate))
          {!! stripslashes(str_replace("\\", '', $requestTemplate->template_content)) !!}
        @endif
      </textarea>
      <span class="error k-error" id="template_content_error">
      </span>

      <textarea class="materialize-textarea templateFields k-textarea" name="template_fields" rows="2" id="template_fields" data-type="requestTemplate">
        @if(isset($template))
          {{$template->template_fields}}
        @else
          {{getRequestTemplateFields()}}
        @endif
      </textarea>
      <span class="error p-0 k-error" id="template_fields_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon saveServiceRequestTemplate" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.service')}} {{trans('message.order')}} {{trans('message.template')}}
          </button>
      </div>
    </div>
  </div>
</form>
