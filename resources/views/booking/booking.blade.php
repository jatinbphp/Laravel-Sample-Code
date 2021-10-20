<div class="row">
	<div class="container">
		<div class="card scrollspy border-radius-6 overflow-hidden mt-0">
			<div class="nav-group calender-filter">
				<div class="date-filter-selection dateSelection">
					@include("booking.date",['from'=>$from,'to' => $to])
				</div>
			</div>
			<form id="form-booking-filter" name="form-booking-filter">
				<input type="hidden" name="room_id" id="room_id" class="roomId">
				<input type="hidden" name="shift_id" id="shift_id" class="shiftId">
				<input type="hidden" name="from_date" id="from_date" class="fromDate">
				<input type="hidden" name="to_date" id="to_date" class="toDate">
				<input type="hidden" name="is_availability" id="is_availability" class="isAvailability">
				<input type="hidden" name="model_id" id="model_id" class="modelId">
				<input type="hidden" name="trainer_id" id="trainer_id" class="trainerId">
			</form>
			<div class="calender-block">
				@include("booking.calender",['rooms'=>$rooms,'dates' => $dates,'shifts' => $shifts,'finalData' => $finalData])
			</div>
		</div>
	</div>
</div>
