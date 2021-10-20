<form method="POST" id="form-booking-view" name="form-booking-view">
	@csrf
	<div class="input-field col s12 k-dropdown">
		<label>{{ trans('message.rooms') }}<span>*</span></label>
		<select name="room_id" id="edit_room_id"   class="browser-default">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach($rooms as $roomId => $room)
			<option value="{{$roomId}}" @if($booking->room_id==$roomId) selected='selected'@endif>{{$room}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="edit_room_id_error"></span>
	</div>
	<div class="input-field col s12 k-dropdown">
		<label>{{ trans('message.shift') }}<span>*</span></label>
		<select name="shift_id" id="edit_shift_id" class="browser-default bookShiftId">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach($shifts as $shiftId => $shift)
			<option value="{{$shiftId}}" @if($booking->tour==$shiftId) selected='selected'@endif>{{$shift}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="edit_shift_id_error"></span>
	</div>
	<div class="input-field col s12  k-input-text">
		<label>{{trans('message.date')}}<span>*</span></label>
		<input type="text" name="date" id="edit_date" class="validate k-txt-box futureDatePicker shiftDate" value="{{date('d-m-Y',strtotime($booking->date))}}" />
		<span class="k-error error" id="edit_date_error"></span>
	</div>
	<div class="input-field col s12 k-dropdown">
		<label>{{trans('message.model')}} <span>*</span></label>
		<select name="booking_model_id" id="booking_model_id" class="browser-default">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach($models as $modelId => $elem)
			<option value="{{$modelId}}" @if($booking->model_id==$modelId) selected='selected'@endif>{{$elem}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="edit_model_id_error"></span>
	</div>

	<div class="bindTrainer">
		@include("booking.trainer",['trainers' => $trainers,'trainersTwo'=> $trainersTwo])
	</div>

	<div class="input-field col s12">
		<div class="switch k-switch k-switch-green">
			<label class="label-text">{{trans('message.shift_approve')}}</label>
			<label>
				<input type="checkbox" name="is_approval" id="is_approval" value="1" class="switchinput" @if($booking->is_approval=='1') checked='checked' @endif>
				<span class="lever m-0"></span>
			</label>
		</div>
	</div>
	<div class="modal_button_center">
	<button class="action-btn   btn k-button-fill k-icon updateBooking right mb-3" data-id="{{ $booking->id }}" type="button"> <img src="{{asset('img/edit.png')}}" alt="">{{trans('message.update')}} {{trans('message.book_shift')}}</button>
	</div>
</form>
