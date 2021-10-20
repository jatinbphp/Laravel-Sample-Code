<form id="form-add-admin-user" name="form-add-admin-user" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">

  <div class="row">
    <div class="input-field col s12 k-dropdown">
      <label for="name3">
        {{trans('message.agency')}} <span>*</span>
      </label>
      <select id="agency_id" name="agency_id" class="superAdminAgency loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAgency() as $agencyId => $agency)
            <option value="{{$agencyId}}" data-badge="" @if(isset($adminUser) && $agencyId == $adminUser->agency_id) selected='selected' @endif>{{$agency}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="agency_id_error">
      </span>
    </div>
  </div>

  <div class="row">

    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.role')}} <span>*</span>
      </label>
      <select id="role_id" name="role_id" class="adminRole loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAdminUserRole() as $roleId => $role)
            <option value="{{$roleId}}" @if(isset($adminUser) && $roleId == $adminUser->role_id) selected='selected' @endif>{{$role}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="role_id_error">
      </span>
    </div>

    <div class="input-field col s6 k-dropdown hidden">
      <label for="name3">
        {{trans('message.studios')}} <span>*</span>
      </label>
      <select id="studio_id" name="studio_id" class="superAdminStudio loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @if(isset($adminUser) && $adminUser->role_id > 2)
            @foreach(getStudioByAgencyId($adminUser->agency_id) as $studioId => $studio)
              <option value="{{$studioId}}" data-badge="" @if(isset($adminUser) && $studioId == $adminUser->studio_id) selected='selected' @endif>{{$studio}}</option>
            @endforeach
          @endif
      </select>
      <span class="error k-error" id="studio_id_error">
      </span>
    </div>

  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($adminUser)) value="{{$adminUser->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>

    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.email')}} <span>*</span>
      </label>
      <input id="name" name="email" type="text" class="validate k-txt-box" @if(isset($adminUser)) value="{{$adminUser->email}}" @endif>
      <span class="error k-error" id="email_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.phone')}}
      </label>
      <input id="name" name="phone_no" type="text" class="validate numeric k-txt-box" @if(isset($adminUser)) value="{{$adminUser->phone}}" @endif>
      <span class="error k-error" id="phone_no_error">
      </span>
    </div>

    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.status')}} <span>*</span>
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          @foreach(["0" => trans('message.active'),"1" => trans('message.inactive')] as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if(isset($adminUser) && $statusId == $adminUser->is_active) selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.password')}}
        @if(!isset($adminUser))
          <span>*</span>
        @endif
        <a data-id="3" title="Edit" class="generatePassword edit-icon"> <i class="material-icons">refresh</i></a>
      </label>
      <input id="password" name="password" type="password" class="validate k-txt-box setGeneratePassword" maxlength="20">
      <span class="showBtn">
        <i class="material-icons">visibility_off</i>
      </span>
      <span class="error k-error" id="password_error"></span>
      <div class="indicator">
        <span class="weak"></span>
        <span class="medium"></span>
        <span class="strong"></span>
      </div>
      <div class="text"></div>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($adminUser))
          <button class="ml-4  btn k-button-fill k-btn action-btn updateAdminUser" name="action" type="submit" data-id="{{$adminUser->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{trans('message.update')}} {{trans('message.admin')}} {{trans('message.user')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon saveAdminUser" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.admin')}} {{trans('message.user')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
