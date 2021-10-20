<form id="form-add-service-request" name="form-add-service-request" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.agency')}} <span>*</span>
      </label>
      <select id="agency_id" name="agency_id" class="serviceRequestAgency loadSelect">
          <option value="">{{trans('message.select')}}</option>
          @foreach(getAgency() as $agencyId => $agency)
            <option value="{{$agencyId}}" data-badge="" @if(isset($serviceRequest) && $agencyId == $serviceRequest->agency_id) selected='selected' @endif>{{$agency}}</option>
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
          @if(isset($serviceRequest))
            @foreach(getServiceRequestStudioByAgencyId($serviceRequest->agency_id) as $studioId => $studio)
              <option value="{{$studioId}}" data-badge="" @if(isset($serviceRequest) && $studioId == $serviceRequest->studio_id) selected='selected' @endif>{{$studio}}</option>
            @endforeach
          @endif
      </select>
      <span class="error k-error" id="studio_id_error">
      </span>
    </div>
    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.contract')}} {{trans('message.model')}} <span>*</span>
      </label>
      <select id="model_id" name="model_id" class="contractRequestModel loadSelect">
          @if(isset($serviceRequest))
            @foreach($final as $modelId => $model)
              <option value="{{$modelId}}" @if(isset($serviceRequest) && $modelId == $serviceRequest->contract_id) selected='selected' @endif>{{$model}}</option>
            @endforeach
          @else
            <option value="">{{trans('message.select')}}</option>
          @endif
      </select>
      <span class="error k-error" id="model_id_error">
      </span>
    </div>
  </div>

  <div class="reqTempData">
    @if(isset($serviceRequest))
        @include("service_request.template")
    @endif
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($serviceRequest))
          <input type="hidden" name="role_id" value="{{$serviceRequest->role_id}}">
          <button class="ml-4  btn k-button-fill k-btn   action-btn updateServiceRequest" name="action" type="submit" data-id="{{$serviceRequest->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{trans('message.update')}} {{trans('message.service')}} {{trans('message.order')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon saveServiceRequest" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.service')}} {{trans('message.order')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
