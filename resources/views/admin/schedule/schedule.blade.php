@if($bookingSchedule != null)
	@foreach($bookingSchedule->rules as $key => $rule)
		@include('schedule.addmore',['rule'=>$rule,'key' => ($key+1)])
	@endforeach
@else
	@include('schedule.addmore',['key' => 1])
@endif
