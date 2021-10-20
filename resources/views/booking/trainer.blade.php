<div class="input-field col s12 k-dropdown">
	<label>{{trans('message.trainer')}} <span>*</span></label>
	<select name="trainer_id" id="trainer_id" class="browser-default">
		<option value="" selected>{{trans('message.select')}}</option>
		@foreach($trainers as $trainerId => $trainer)
		<option value="{{$trainerId}}" @if(isset($booking) && $booking->trainer_id==$trainerId) selected='selected'@endif>{{$trainer}}</option>
		@endforeach
	</select>
	<span class="k-error error" id="trainer_id_error"></span>
</div>

@if(isset($trainersTwo) && $trainersTwo != null && $shift_id == "2")
	<div class="input-field col s12 k-dropdown">
		<label>{{trans('message.trainer_two')}} <span>*</span></label>
		<select name="trainer2_id" id="trainer2_id" class="browser-default">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach($trainersTwo as $trainerId2 => $trainer)
			<option value="{{$trainerId2}}" @if(isset($booking) && $booking->trainer2_id==$trainerId2) selected='selected'@endif >{{$trainer}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="trainer2_id_error"></span>
	</div>
@endif
