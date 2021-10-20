<form id="form-add-studio" name="form-add-studio" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">

  @if ($userRoleName == "Super Admin")
    <div class="row">
        <div class="input-field col s12 k-dropdown">
          <label for="name3">
            {{trans('message.agency')}} <span>*</span>
          </label>
          <select id="agency_id" name="agency_id" class="loadSelect">
            <option value="">{{trans('message.select')}}</option>
            @foreach(getAgency() as $agencyId => $agency)
            <option value="{{$agencyId}}" data-badge="" @if(isset($studio) && $agencyId == $studio->agency_id) selected='selected' @endif>{{$agency}}</option>
            @endforeach
          </select>
          <span class="error k-error" id="agency_id_error">
          </span>
        </div>
    </div>
  @endif

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.studio')}} {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($studio)) value="{{$studio->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>

    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.studio')}} {{trans('message.phone')}}
      </label>
      <input id="name" name="phone_no" type="text" class="validate numeric k-txt-box" @if(isset($studio)) value="{{$studio->phone_no}}" @endif>
      <span class="error k-error" id="phone_no_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.studio')}} {{trans('message.logo')}}
      </label>
      <input id="input-file-photo" name="logo" type="file" class="dropify-event center" @if(isset($studio)) data-default-file="{{$studio->logo}}" @endif data-allowed-file-extensions="png jpg jpeg" data-max-file-size-preview="1M">
      <span class="error k-error" id="logo_error">
      </span>
    </div>

    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.studio')}} {{trans('message.address')}}
      </label>
      <textarea class="materialize-textarea k-textarea" name="address" rows="2" id="notes">@if(isset($studio)) {{$studio->address}} @endif </textarea>
      <span class="error p-0 k-error" id="address_error">
      </span>
    </div>

    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.status')}}
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(["0" => trans('message.active'),"1" => trans('message.inactive')] as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if(isset($studio) && $statusId == $studio->is_active) selected='selected' @elseif($statusId == '0') selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>

  </div>
  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($studio))
        <button class="ml-4  btn k-button-fill k-btn   action-btn updateStudio" name="action" type="submit" data-id="{{$studio->id}}">
          <img src="{{asset('img/edit.png')}}" alt="">
          {{trans('message.update')}} {{trans('message.studio')}}
        </button>
        @else
        <button class="action-btn  btn k-button-fill k-icon saveStudio" type="submit">
          <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.studio')}}
        </button>
        @endif
      </div>
    </div>
  </div>
</form>
