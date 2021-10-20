<form id="form-add-flow-type" name="form-add-flow-type" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field  col s12 k-input-text">
      <label for="name3">
        {{trans('message.name')}} <span>*</span>
      </label>
      <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($flowType)) value="{{$flowType->name}}" @endif>
      <span class="error k-error" id="name_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <label class="active" for="role_resolver">
        {{trans('message.problem')}} <span>*</span>
      </label>
      <ul id="sortable1" class="connectedSortable selectedProblem">
        @if(isset($flowType))
          @php
            $flows = explode(",", $flowType->problems);
          @endphp
          @foreach(getDependencyProblemWithIcon() as $flowTypeId => $flowTypeName)
            @if(in_array($flowTypeId,$flows))
              <li class="ui-state-highlight" data-id="{{$flowTypeId}}">
                {!! $flowTypeName !!}
              </li>
            @endif
          @endforeach
        @endif
      </ul>
      <ul id="sortable2" class="connectedSortable">
          @php
            $flows = (isset($flowType) ? explode(",", $flowType->problems) : []);
          @endphp
          @foreach(getDependencyProblemWithIcon() as $flowTypeId => $flowTypeName)
            @if(isset($flows) && !in_array($flowTypeId,$flows))
              <li class="ui-state-highlight" data-id="{{$flowTypeId}}">
                {!! $flowTypeName !!}
              </li>
            @endif
          @endforeach
      </ul>
      <span class="error k-error" id="role_resolver_error"></span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($flowType))
        <button class="ml-4  btn k-button-fill k-btn  submit-edit-interview action-btn updateFlowType" name="action" type="submit" data-id="{{$flowType->id}}">
          <img src="{{asset('img/edit.png')}}" alt="">
          {{trans('message.update')}} {{trans('message.flow')}} {{trans('message.type')}}
        </button>
        @else
        <button class="action-btn  btn k-button-fill k-icon submitFlowType" type="submit">
          <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.flow')}} {{trans('message.type')}}
        </button>
        @endif
      </div>
    </div>
  </div>
</form>
