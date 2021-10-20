<form method="POST" id="form-add-staff-question" name="form-add-staff-question">
	@csrf
	<div class="row">
		<div class="input-field col s12 k-dropdown">
			<label>{{ trans('message.role') }} <span>*</span></label>
			<select name="role_id" id="role_id"   class="browser-default">
				<option value="" selected>{{trans('message.select')}}</option>
				@foreach(array_diff(getRoles(),['Administrator','Model']) as $roleId => $role)
					<option value="{{$roleId}}">{{$role}}</option>
				@endforeach
			</select>
			<span class="k-error error" id="role_id_error"></span>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s12 k-input-text">
			<label>{{trans('message.question')}} <span>*</span></label>
			<input type="text" name="question" id="question" class="validate k-txt-box"/>
			<span class="k-error error" id="question_error"></span>
		</div>
	</div>

	<div class="modal_button_center">
		<button class="action-btn  btn k-button-fill k-icon saveStaffQuestion right mb-3" type="button"><img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.staff')}} {{trans('message.question')}}</button>
	</div>
</form>
