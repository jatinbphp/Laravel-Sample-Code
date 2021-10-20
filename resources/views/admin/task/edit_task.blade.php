<div class="card quill-wrapper">
	<div class="card-content pt-0">
		<div class="card-header display-flex pb-2">
			<h3 class="card-title">{{trans('message.edit_task')}}</h3>
			<div class="close close-icon closeSideBar">
	            <img src="{{asset('img/icon-close.png')}}" alt="">
			</div>
		</div>
		<div class="divider"></div>
		<form method="POST" id="form-edit-task_request" name="form-edit-task_request">
			@csrf
			<div class=" input-group input-field k-dropdown">
				<label>{{trans('message.predefined_tasks')}}</label>
				<select name="fix_task_id" id="fix_task_id" class="task_fix browser-default"  >
					<option value="" selected>{{trans('message.select')}}</option>
					@foreach($fix_task as $key => $elem)
					<option value="{{$key}}" @if($key==$task->fix_task_id)selected @endif>{{$elem}}</option>
					@endforeach
				</select>
				<span class="k-error error" id="task_fix_error"></span>
			</div>
			<div class="input-group input-field k-input-text">
				<label>{{trans('message.title')}} <span>*</span></label>
				<input type="text" name="task_description"  class="validate k-txt-box" id="task_description" value="{{$task->description}}" />
				<span class="k-error error" id="task_description_error"></span>
			</div>
			<div class="input-group input-field k-input-text">
				<label>{{trans('message.description')}}</label>
				<input type="text" name="task_description2" class="validate k-txt-box" id="task_description2" value="{{$task->description2}}" />
				<span class="k-error error" id="task_description2_error"></span>
			</div>
			<div class="input-group input-field k-input-text">
				<label>{{trans('message.date')}} <span>*</span></label>
				<input type="text" name="task_date" id="task_date" class="validate k-txt-box futureDatePicker" value="{{$task->date}}" />
				<span class="k-error error" id="task_date_error"></span>
			</div>
			<div class="input-group input-field k-input-text">
				<label>{{trans('message.hour')}} <span>*</span></label>
				<input type="text" name="hour" id="hour" class="validate timePicker k-txt-box"  value="{{$task->hour}}" />
				<span class="k-error error" id="hour_error"></span>
			</div>
			<div class="input-field  k-dropdown">
				<label>{{trans('message.priority')}} <span>*</span></label>
				<select name="priority" id="priority"  class="browser-default">
					@foreach($labels as $key=> $label)
					<option value="{{$key}}" @if($label==$task->label)selected @endif>{{$label}}</option>
					@endforeach
				</select>
				<span class="k-error error" id="priority_error"></span>
			</div>
			<div class="input-field  k-dropdown">
				<label>{{trans('message.select_the_group')}}</label>
				<select name="group_id" class="browser-default">
					<option value="-1" selected>{{trans('message.no_group')}}</option>
					@foreach($groups as $key => $group)
					<option value="{{$key}}" @if($key == $task->group_id) selected @endif>
						{{$group}}
					</option>
					@endforeach
				</select>
				<span class="k-error error" id="group_id_error"></span>
			</div>
			<div class="input-field  k-dropdown">
				<label>{{trans('message.select_the_user')}} </label>
				<select name="user_id" id="user_id" class="browser-default">
					<option value="" selected>{{trans('message.no_member')}}</option>
					@foreach($users as $userId => $user)
					<option value="{{$userId}}" @if($userId==$task->user_id)selected @endif>
						{{$user}}
					</option>
					@endforeach
				</select>
				<span class="k-error error" id="user_id_error"></span>
			</div>

			<div class="row">
				<div class="modal_button_center" >
					<button data-id="{{$task->id}}" class="action-btn  btn k-button-fill k-btn-normal adminUpdateTask mb-3" type="button">
						<img src="{{asset('img/edit.png')}}">
						{{trans('message.update')}} {{trans('message.task')}}
					</button>
					<button data-id="{{$task->id}}" class="action-btn  btn k-button-fill k-btn-normal adminDeleteTask mb-3" type="button">
						<img src="{{asset('img/delete.png')}}">
						{{trans('message.delete')}} {{trans('message.task')}}
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
