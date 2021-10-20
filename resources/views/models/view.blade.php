<form method="POST" id="form-model-booking-edit" name="form-model-booking-edit">
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
		<select name="shift_id" id="edit_shift_id" class="browser-default">
			<option value="" selected>{{trans('message.select')}}</option>
			@foreach($shifts as $shiftId => $shift)
			<option value="{{$shiftId}}" @if($booking->tour==$shiftId) selected='selected'@endif>{{$shift}}</option>
			@endforeach
		</select>
		<span class="k-error error" id="edit_shift_id_error"></span>
	</div>
	<div class="input-field col s12  k-input-text">
		<label>{{trans('message.date')}}<span>*</span></label>
		<input type="text" name="date" id="edit_date" class="validate k-txt-box futureDatePicker" value="{{date('d-m-Y',strtotime($booking->date))}}" />
		<span class="k-error error" id="edit_date_error"></span>
	</div>
	 <div class="modal_button_center">
		<button class=" btn k-button-fill k-btn-normal updateModelBooking    " data-id="{{ $booking->id }}" type="button">
			<img src="{{asset('img/edit.png')}}"   alt=""> {{ trans('message.update')}} {{trans('message.book_shift')}}</button>

		<button class=" btn k-button-fill k-btn-normal deleteModelBooking right mb-3" data-id="{{ $booking->id }}" type="button"><img src="{{asset('img/delete.png')}}" alt=""> {{trans('message.remove_shift')}}</button>
	</div>
</form>
