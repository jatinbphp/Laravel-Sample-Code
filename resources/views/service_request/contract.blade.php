<form id="form-add-service-request" name="form-add-service-request" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.agency')}} <span>*</span>
      </label>
      <select id="agency_id" name="agency_id" class="serviceRequestAgency loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAgency() as $agencyId => $agency)
            <option value="{{$agencyId}}" data-badge="" @if($agencyId == $userAgencyId) selected='selected' @endif>{{$agency}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="agency_id_error">
      </span>
    </div>
    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.studios')}} <span>*</span>
      </label>
      <select id="studio_id" name="studio_id" class="serviceRequestStudio loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getServiceRequestStudioByAgencyId($userAgencyId) as $studioId => $studio)
            <option value="{{$studioId}}" data-badge="" @if($studioId == $userStudioId) selected='selected' @endif>{{$studio}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="studio_id_error">
      </span>
    </div>
    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.model')}} <span>*</span>
      </label>
      <select id="model_id" name="model_id" class="contractRequestModel loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach($final as $modelId => $model)
            <option value="{{$modelId}}" @if($modelId == $contractId) selected='selected' @endif>{{$model}}</option>
          @endforeach
      </select>
      <span class="error k-error" id="model_id_error">
      </span>
    </div>
  </div>

  <div class="reqTempData">

  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon saveServiceRequest" type="submit">
          <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.service')}} {{trans('message.request')}}
        </button>
      </div>
    </div>
  </div>
</form>
