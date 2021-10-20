<form method="POST" id="form-booking-change" name="form-booking-change">
	@csrf
	<input type="hidden" name="date" id="date" value="{{$date}}">
	<input type="hidden" name="room_id" id="room_id" value="{{$roomId}}">
	<input type="hidden" name="shift_id" id="shift_id" value="{{$shift_id}}">
	<input type="hidden" name="booking_model_id" id="booking_model_id" value="{{$modelId}}">
	<input type="hidden" name="is_approval" id="is_approval" value="{{$isApproval}}">
	<div class="bindTrainer">
		@include("booking.trainer",['trainers' => $trainers,'trainersTwo'=> $trainersTwo])
	</div>
	<button class=" btn k-button-fill k-btn-normal changeBooking right mb-3" data-id="{{ $booking->id }}" type="button">{{trans('message.book_shift')}}</button>
</form>
