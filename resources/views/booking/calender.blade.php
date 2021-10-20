<div class="caldern-top-row-block">
	<div class="left-part-block-room">
		<div class="top-left-part">
			<p>Rooms</p>
		</div>
		@foreach($tourRoom as $key => $room)
		<div class="week-day-main">
			<div class="week-day-name">
				<p>{{$rooms[$room]}}</p>
			</div>
		</div>
		@endforeach
	</div>
	<div class="right-room-number">
		<div class="top-room-number-block">
			@foreach($dates as $k => $date)
				<div class="week-day-main">
					<div class="week-day-name">
						<p>{{date('D d/m',strtotime($date))}}</p>
					</div>
					<div class="week-day-sheft">
						@foreach($tourShift as $k => $shift)
						<span>T{{($shift)}}</span>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
		<div class="room-box-list">
			@foreach($tourRoom as $key => $room)
				<div class="room-box-list-row">
					@foreach($dates as $key1 => $date)
						@php
							$day = date('l',strtotime($date));
							$today = date('Y-m-d');
							$data = week_range($today);
							$monday=$data['0'];
						@endphp
						@foreach($tourShift as $key2 => $shift)
							@if(isset($finalData[$room][$date][$shift]))
								<a href="#" class="modelDroppable {{$finalData[$room][$date][$shift]['class']}} tooltipped" data-area="admin" data-id="{{$finalData[$room][$date][$shift]['id']}}" data-tooltip="Room :- {{$rooms[$room]}} <br> Date :- {{date('d F Y',strtotime($date))}} <br> Day :- {{$day}} <br> Shift :- {{$shifts[$shift]}} <br> Model :- {{$models[$finalData[$room][$date][$shift]['model_id']]}} <br> Trainer :- {{$trainers[$finalData[$room][$date][$shift]['trainer_id']]}}" data-room="{{$room}}" data-shift="{{$shift}}" data-date="{{$date}}">
	                                <span  data-id="{{$finalData[$room][$date][$shift]['id']}}"  data-tooltip="Room :- {{$rooms[$room]}} <br> Date :- {{date('d F Y',strtotime($date))}} <br> Day :- {{$day}} <br> Shift :- {{$shifts[$shift]}} <br> Model :- {{$models[$finalData[$room][$date][$shift]['model_id']]}} <br> Trainer :- {{$trainers[$finalData[$room][$date][$shift]['trainer_id']]}}  "  class="drop_item tooltipped {{$finalData[$room][$date][$shift]['span_class']}}"> </span>
	                            </a>
							@else
								<a href="#" class="bookModelShift modelDroppable tooltipped" data-area="admin" data-tooltip="Book this shift" data-room="{{$room}}" data-shift="{{$shift}}" data-date="{{date('d-m-Y',strtotime($date))}}">
                                    <span></span>
                                </a>
							@endif

						@endforeach
					@endforeach
				</div>
			@endforeach
		</div>
	</div>
</div>
