<form id="form-add-agency-user" name="form-add-agency-user" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.agency')}} <span>*</span>
      </label>
      <select id="agency_id" name="agency_id" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAgency() as $agencyId => $agency)
            <option value="{{$agencyId}}" data-badge="" @if(isset($agencyAdmin) && $agencyId == $agencyAdmin->agency_id) selected='selected' @endif>{{$agency}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="agency_id_error">
      </span>
    </div>
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($agencyAdmin)) value="{{$agencyAdmin->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.email')}} <span>*</span>
      </label>
      <input id="name" name="email" type="text" class="validate k-txt-box" @if(isset($agencyAdmin)) value="{{$agencyAdmin->email}}" @endif>
      <span class="error k-error" id="email_error">
      </span>
    </div>
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.phone')}}
      </label>
      <input id="name" name="phone_no" type="text" class="validate numeric k-txt-box" @if(isset($agencyAdmin)) value="{{$agencyAdmin->phone}}" @endif>
      <span class="error k-error" id="phone_no_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.password')}}
        @if(!isset($agencyAdmin))
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
    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.status')}} <span>*</span>
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          @foreach(["0" => trans('message.active'),"1" => trans('message.inactive')] as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if(isset($agencyAdmin) && $statusId == $agencyAdmin->is_active) selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($agencyAdmin))
          <button class="ml-4  btn k-button-fill k-btn   action-btn updateAgencyAdmin" name="action" type="submit" data-id="{{$agencyAdmin->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{trans('message.update')}} {{trans('message.agency')}} {{trans('message.admin')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon saveAgencyAdmin" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.agency')}} {{trans('message.admin')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
