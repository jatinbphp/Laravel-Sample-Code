<form id="form-add-agency" name="form-add-agency" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.agency')}} {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($agency)) value="{{$agency->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>
    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.agency')}} {{trans('message.phone')}}
      </label>
      <input id="name" name="phone_no" type="text" class="validate numeric k-txt-box" @if(isset($agency)) value="{{$agency->phone_no}}" @endif>
      <span class="error k-error" id="phone_no_error">
      </span>
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.agency')}} {{trans('message.logo')}}
      </label>
      <input type="file" name="logo" id="input-file-photo" class="dropify-event center"
      @if(isset($agency)) data-default-file="{{$agency->logo}}" @endif data-allowed-file-extensions="png jpg jpeg" data-max-file-size-preview="1M"/>
      <span class="error k-error" id="logo_error"></span>
    </div>

    <div class="input-field col s6 k-input-text">
      <label for="name3">
        {{trans('message.agency')}} {{trans('message.address')}}
      </label>
      <textarea class="materialize-textarea k-textarea" name="address" rows="2" id="notes">@if(isset($agency)) {{$agency->address}} @endif </textarea>
      <span class="error p-0 k-error" id="address_error">
      </span>
    </div>

    <div class="input-field col s6 k-dropdown">
      <label for="name3">
        {{trans('message.agency')}} {{trans('message.status')}}
      </label>
      <select id="is_active" name="is_active" class="loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(["0" => trans('message.active'),"1" => trans('message.inactive')] as $statusId => $status)
            <option value="{{$statusId}}" data-badge="" @if(isset($agency) && $statusId == $agency->is_active) selected='selected' @elseif($statusId == '0') selected='selected' @endif>{{$status}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="is_active_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($agency))
            <button class="ml-4 btn k-button-fill k-btn action-btn updateAgency" name="action" type="submit" data-id="{{$agency->id}}">
              <img src="{{asset('img/edit.png')}}" alt="">
              {{trans('message.update')}} {{trans('message.agency')}}
            </button>
        @else
            <button class="action-btn  btn k-button-fill k-icon saveAgency" type="submit">
              <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.agency')}}
            </button>
        @endif
      </div>
    </div>
  </div>
</form>
