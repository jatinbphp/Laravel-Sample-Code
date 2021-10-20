<form id="form-booking-schedule-filter" name="form-booking-schedule-filter">
	<input type="hidden" name="from_date" id="from_date" class="fromDate">
	<input type="hidden" name="to_date" id="to_date" class="toDate">
	<input type="hidden" name="date" id="date" class="todayDate">
	<input type="hidden" name="layout" id="layout" value="{{$layout}}" class="scheduleLayout">
</form>

<div class="previewData">
	@include("schedule.preview")
</div>
