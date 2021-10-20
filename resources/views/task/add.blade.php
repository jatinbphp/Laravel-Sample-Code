<form method="POST" id="form-general-task" name="form-general-task" class="col s12 pl-0 pr-0">
    <div class="row">
        <div class=" input-field col s6 k-dropdown">
            <label>{{trans('message.predefined_tasks')}}  <span>*</span></label>
            <select name="task_fix" id="task_fix" class="task_fix browser-default"  >
                <option value="" selected>{{trans('message.select')}}</option>
                @foreach(getFixTask() as $taskId => $task)
                <option value="{{$taskId}}">{{$task}}</option>
                @endforeach
            </select>
            <span class="k-error error" id="task_fix_error"></span>
        </div>
        <div class="input-field col s6 k-input-text">
            <label>{{trans('message.title')}} <span>*</span></label>
            <input type="text" name="task_description"  class="validate k-txt-box" id="task_description" />
            <span class="k-error error" id="task_description_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 k-input-text">
            <label>{{trans('message.description')}} <span>*</span></label>
            <input type="text" name="task_description2" class="validate k-txt-box" id="task_description2"/>
            <span class="k-error error" id="task_description2_error"></span>
        </div>
        <div class="input-field col s6 k-input-text">
            <label>{{trans('message.date')}} <span>*</span></label>
            <input type="text" name="task_date" id="task_date" class="validate k-txt-box futureDatePicker"/>
            <span class="k-error error" id="task_date_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 k-input-text">
            <label>{{trans('message.hour')}} <span>*</span></label>
            <input type="text" name="hour" id="hour" class="validate timePicker k-txt-box" />
            <span class="k-error error" id="hour_error"></span>
        </div>

        <div class="input-field col s6 k-dropdown">
            <label>{{trans('message.priority')}} </label>
            <select name="priority" id="priority"  class="browser-default">
                @foreach(getPriorityLable() as $labelId => $label)
                <option value="{{$labelId}}">{{$label}}</option>
                @endforeach
            </select>
            <span class="k-error error" id="priority_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 k-dropdown">
            <label>{{trans('message.select_the_group')}}</label>
            <select name="group_id" class="browser-default">
                <option value="-1" selected>{{trans('message.no_group')}}</option>
                @foreach(array_diff(getRoles(),['Administrator','Model']) as $roleId => $role)
                <option value="{{$roleId}}">{{$role}}</option>
                @endforeach
            </select>
            <span class="k-error error" id="model_id_error"></span>
        </div>
        <div class="input-field col s6 k-dropdown">
            <label>{{trans('message.choose_the_model')}} <span>*</span></label>
            <select name="model_id" id="model_id" class="browser-default">
                <option value="" selected>{{trans('message.no_model')}}</option>
                @foreach(getActiveModel() as $key => $elem)
                <option value="{{$key}}">{{$elem}}</option>
                @endforeach
            </select>
            <span class="k-error error" id="model_id_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 k-dropdown">
            <label>{{trans('message.select_the_user')}} <span>*</span></label>
            <select name="user_id" id="user_id" class="browser-default">
                <option value="" selected>{{trans('message.no_member')}}</option>
                @foreach(array_diff(getRoles(),['Administrator','Model']) as $roleId => $role)
                    <optgroup label="{{$role}}">
                      @foreach(getAllUserByRole($roleId) as $userId => $user)
                      <option value="{{$userId}}">{{$user}}</option>
                      @endforeach
                    </optgroup>
                @endforeach
            </select>
            <span class="k-error error" id="user_id_error"></span>
        </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
          <button class="action-btn  btn k-button-fill k-icon saveTask" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.task')}}
          </button>
      </div>
    </div>
  </div>
</form>
