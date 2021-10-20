<form id="form-add-contract-template" name="form-add-contract-template" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
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
      <select id="studio_id" name="studio_id" class="superAdminStudio loadSelect" data-type="contractCategory">
          <option value="">{{trans('message.select')}}</option>
      </select>
      <span class="error k-error" id="studio_id_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.role')}} <span>*</span>
      </label>
      <select id="role_id" name="role_id" class="contractRole loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getContractRole() as $roleId => $role)
            <option value="{{$roleId}}">{{$role}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="role_id_error">
      </span>
    </div>

    <div class="input-field col s3 k-input-text">
      <label for="name3">
        {{trans('message.template')}} {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" value="{{$template->name}}">
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
            <option value="{{$statusId}}" data-badge="" @if($statusId == '0') selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>

    <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.signature')}} {{trans('message.admin')}} <span>*</span>
      </label>
      <select id="signature_admin_id" name="signature_admin_id" class="loadSelect">
          @foreach(getSignatureAdmin() as $userId => $user)
            <option value="{{$userId}}" data-badge="" @if(isset($template) && $userId == $template->signature_admin_id) selected='selected' @endif>{{$user}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="signature_admin_id_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <label for="name3">
        {{trans('message.content')}} <span>*</span>
        <a data-id="3" title="Edit" class="replaceContractFields edit-icon"> <i class="material-icons">refresh</i></a>
      </label>
      <textarea class="materialize-textarea k-textarea" name="content" rows="2" id="templateContent">
        @if(isset($template))
          {!! stripslashes(str_replace("\\", '', $template->content)) !!}
        @endif
      </textarea>
      <span class="error k-error" id="content_error">
      </span>
      <textarea class="materialize-textarea contractFields k-textarea" name="content_fields" rows="2" id="content_fields" data-type="templateContent">
        @if(isset($template))
          {{$template->content_fields}}
        @else
          {{getTemplateFields()}}
        @endif
      </textarea>
      <span class="error p-0 k-error" id="content_fields_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon saveContractTemplate" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.contract')}} {{trans('message.template')}}
          </button>
      </div>
    </div>
  </div>
</form>
