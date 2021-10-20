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
			@php
				$colors = ['l-ping-box',' ','l-green-box',' ','ld-green-box','sky-box',' '];
			@endphp
			@foreach($tourRoom as $key => $room)
				<div class="room-box-list-row">
					@foreach($dates as $key1 => $date)
					@php
					$day =date('l',strtotime($date));
					@endphp
						@foreach($tourShift as $key2 => $shift)
							@if(isset($finalData[$room][$date][$shift]))
								<a href="#" class="modelDroppable {{$finalData[$room][$date][$shift]['class']}} tooltipped" data-id="{{$finalData[$room][$date][$shift]['id']}}" data-tooltip="{{ trans('message.room') }} :- {{$rooms[$room]}} <br> Date :- {{date('d F Y',strtotime($date))}} <br> Day :- {{$day}} <br> Shift :- {{$shifts[$shift]}}" data-room="{{$room}}" data-shift="{{$shift}}" data-date="{{$date}}">
	                                <span  data-id="{{$finalData[$room][$date][$shift]['id']}}"  data-tooltip="{{ trans('message.room') }} :- {{$rooms[$room]}} <br> Date :- {{date('d F Y',strtotime($date))}} <br> Day :- {{$day}} <br> Shift :- {{$shifts[$shift]}}" class="drop_item tooltipped {{$finalData[$room][$date][$shift]['span_class']}}"> </span>
	                            </a>
							@else
								<a href="#" class="bookShift modelDroppable tooltipped" data-tooltip="{{ trans('message.book_this_shift') }} " data-room="{{$room}}" data-shift="{{$shift}}" data-date="{{date('d-m-Y',strtotime($date))}}">
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
