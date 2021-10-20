<form id="form-add-problem" name="form-add-problem" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field  col s6 k-input-text">
            <label for="name3">
                {{trans('message.name')}} <span>*</span>
            </label>
            <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($problem)) value="{{$problem->name}}" @endif>
            <span class="error k-error" id="name_error">
            </span>
        </div>

        <div class="input-field col s6 k-dropdown">
            <label class="active" for="problem_role_id">
                {{trans('message.flow')}} {{trans('message.role')}} <span>*</span>
            </label>
            <select id="problem_role_id" name="problem_role_id" class="problemRole" multiple="multiple">
                @foreach(array_diff(getRoles(),['Administrator']) as $roleId => $role)
                    <option value="{{$roleId}}" @if(isset($problem) && in_array($roleId,explode(",",$problem->problem_role_id))) selected='selected' @endif >{{$role}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="problem_role_id_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6 k-dropdown ">
            <label class="active" for="role_resolver">
                {{trans('message.role_resolver')}} <span>*</span>
            </label>
            <select id="role_resolver" name="role_resolver" class="roleResolver" multiple="multiple">
                @foreach(getRoles() as $roleId => $role)
                    <option value="{{$roleId}}" @if(isset($problem) && in_array($roleId,explode(",",$problem->role_resolver))) selected='selected' @endif >{{$role}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="role_resolver_error"></span>
        </div>

        <div class="input-field col s6 k-dropdown">
            <label class="active" for="role_resolver">
                {{trans('message.dependancy_problem')}} <span>*</span>
            </label>
            <select id="dependancy_flow" name="dependancy_flow" class=" dependancyFlow" multiple="multiple">
                @foreach(getDependencyProblem() as $problemId => $problemName)
                    <option value="{{$problemId}}" @if(isset($problem) && in_array($problemId,explode(",",$problem->dependancy_flow))) selected='selected' @endif >{{$problemName}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="role_resolver_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s3 k-input-text">
            <label for="name3">
                {{trans('message.expired')}} {{trans('message.day')}}
            </label>
            <input id="expired_at" name="expired_at" type="text" class="numeric k-txt-box" @if(isset($problem)) value="{{$problem->expired_at}}" @endif maxlength="2">
            <span class="error k-error" id="expired_at_error">
            </span>
        </div>

        <div class="input-field col s9 k-input-text">
            <label for="name3">
                {{trans('message.flow')}} {{trans('message.icon')}}<span>*</span>
            </label>
            <input id="input-file-photo" name="icon" type="file" class="dropify-event center" @if(isset($problem)) data-default-file="{{$problem->icon}}" @endif>
            <span class="error k-error" id="icon_error">
            </span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 k-dropdown">
            <label for="name3" class="label-form-control-block">
                <p>{{trans('message.flow')}} {{trans('message.task')}} <span>*</span></p>
                <div class="switch k-switch k-switch-green">
                    <label>
                      <input type="checkbox" class="filled-in" id="generateTask" value="1" name="is_generate_task" @if(isset($problem) && $problem->is_generate_task == '1') checked='checked' @endif />
                      <span class="lever"></span>
                    </label>
                </div>
            </label>
            <select id="problem_task" name="problem_task" class="generateTask" multiple="multiple" disabled="disabled">
                @foreach(getFixTask() as $taskId => $task)
                    <option value="{{$taskId}}" @if(isset($problem) && in_array($taskId,explode(",",$problem->problem_task))) selected='selected' @endif >{{$task}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="problem_role_id_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 k-input-text">
            <label for="name3" class="label-form-control-block">
                <p>{{trans('message.flow')}} {{trans('message.post')}} <span>*</span></p>
                <div class="switch k-switch k-switch-green">
                    <label>
                      <input type="checkbox" class="filled-in" id="generatePost" value="1" name="is_generate_post" @if(isset($problem) && $problem->is_generate_post == '1') checked='checked' @endif />
                      <span class="lever"></span>
                    </label>
                </div>
            </label>
            <textarea id="textarea1" name="problem_post" class="materialize-textarea k-textarea generatePost" disabled="disabled">
                @if(isset($problem)) {{$problem->problem_post}} @endif
            </textarea>
            <span class="error k-error" id="problem_post_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 k-input-text">
            <label for="name3" class="label-form-control-block">
                <p>{{trans('message.flow')}} {{trans('message.email')}} <span>*</span></p>
                <div class="switch k-switch k-switch-green">
                    <label>
                      <input type="checkbox" class="filled-in" id="generateEmail" value="1" name="is_generate_email" @if(isset($problem) && $problem->is_generate_email == '1') checked='checked' @endif />
                      <span class="lever"></span>
                    </label>
                </div>
            </label>
            <textarea id="textarea1" name="problem_email" class="materialize-textarea k-textarea generateEmail" disabled="disabled">
                @if(isset($problem)) {{$problem->problem_email}} @endif
            </textarea>
            <span class="error k-error" id="problem_email_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 k-input-text">
            <label for="name3" class="label-form-control-block">
                <p>{{trans('message.flow')}} {{trans('message.notifications')}} <span>*</span></p>
                <div class="switch k-switch k-switch-green">
                    <label>
                      <input type="checkbox" class="filled-in" id="generateNotification" value="1" name="is_generate_notification" @if(isset($problem) && $problem->is_generate_notification == '1') checked='checked' @endif />
                      <span class="lever"></span>
                    </label>
                </div>
            </label>
            <textarea id="textarea1" name="problem_notification" class="materialize-textarea k-textarea generateNotification" disabled="disabled">
                @if(isset($problem)) {{$problem->problem_notification}} @endif
            </textarea>
            <span class="error k-error" id="problem_notification_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <div class="modal_button_center">
                @if(isset($problem))
                    <button class="ml-4  btn k-button-fill k-btn  submit-edit-interview action-btn updateAdminProblemFlow" name="action" type="submit" data-id="{{$problem->id}}">
                        <img src="{{asset('img/edit.png')}}" alt="">
                        {{trans('message.update')}} {{trans('message.flow')}}
                    </button>
                @else
                    <button class="action-btn  btn k-button-fill k-icon submitAdminProblemFlow" type="submit">
                        <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.flow')}}
                    </button>
                @endif
            </div>
        </div>
    </div>
</form>
