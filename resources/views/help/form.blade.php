@if($userRoleName == "Super Admin")
  <form id="form-add-help" name="form-add-help" class="display-flex flex-column h-100 justify-content-between">
    <div class="row">
      <div class="input-field col s12 k-input-text">
        <label for="name3">
          {{trans('message.help')}} <span>*</span>
        </label>
        <textarea class="materialize-textarea k-textarea" name="question" rows="2" id="helpContent">
          @if(isset($helpQuestion))
            {{$helpQuestion->question}}
          @endif
        </textarea>
        <span class="error k-error" id="question_error">
        </span>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <div class="modal_button_center">
          @if(isset($helpQuestion))
            <button class="ml-4  btn k-button-fill k-btn   action-btn saveHelpQuestion" name="action" type="submit" data-id="{{$helpQuestion->id}}" data-module="{{$module}}" data-action="{{$action}}">
              <img src="{{asset('img/edit.png')}}" alt="">
              {{trans('message.update')}} {{trans('message.help')}}
            </button>
          @else
            <button class="action-btn  btn k-button-fill k-icon saveHelpQuestion" type="submit" data-module="{{$module}}" data-action="{{$action}}">
              <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.help')}}
            </button>
          @endif
        </div>
      </div>
    </div>
  </form>
@else
  <div class="row">
    <div class="input-field col s12 k-input-text">
      <div id="helpReadContent">
        @if(isset($helpQuestion))
        {!! $helpQuestion->question !!}
        @endif
      </div>
    </div>
  </div>
@endif
