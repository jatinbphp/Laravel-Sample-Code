<form method="POST" id="form-booking-add" name="form-booking-add">
	@csrf
	<div class="input-field col s12 k-dropdown">
		<label>{{ trans('message.rooms') }} <span>*</span></label>
		<select name="room_id" id="room_id"   class="browser-default">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach(getAllRoom() as $roomId => $room)
				<option value="{{$roomId}}" @if($room_id==$roomId) selected='selected'@endif>{{$room}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="room_id_error"></span>
	</div>

	<div class="input-field col s12 k-dropdown">
		<label>{{ trans('message.shift') }} <span>*</span></label>
		<select name="shift_id" id="shift_id"  class="browser-default bookShiftId">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach(getShift() as $shiftId => $shift)
				<option value="{{$shiftId}}" @if($shift_id==$shiftId) selected='selected'@endif>{{$shift}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="shift_id_error"></span>
	</div>
	<div class=" input-field k-input-text">
		<label>{{trans('message.date')}} <span>*</span></label>
		<input type="text" name="date" id="date" class="validate k-txt-box futureDatePicker shiftDate" value="{{$date}}" />
		<span class="k-error error" id="date_error"></span>
	</div>

	<div class="input-field col s12 k-dropdown">
		<label>{{trans('message.model')}} <span>*</span></label>
		<select name="booking_model_id" id="booking_model_id" class="browser-default ">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach(getActiveModel() as $modelId => $elem)
				<option value="{{$modelId}}">{{$elem}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="booking_model_id_error"></span>
	</div>

	<div class="bindTrainer">
		@include("booking.trainer",['trainers' => $trainers,'trainersTwo'=>$trainersTwo])
	</div>
	<div class="modal_button_center">
	<button class="action-btn   btn k-button-fill k-icon saveBooking right mb-3" type="button"><img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.book_shift')}}</button>
</div>
</form>
