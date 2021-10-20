@foreach($weekData as $key => $finalData)
	@php
		$dates = array_keys($finalData);
	@endphp
	<div class="caldern-top-row-block {{$layoutCls}}">
		<div class="left-part-block-room">
			<div class="top-left-part">
				<p>{{trans('message.room')}}</p>
			</div>
			<div class="hours-listing">
				<div class="scrroll-block">
					@foreach($tourShift as $shiftId => $shift)
						@php
							if ($shiftId == "1") {
			                    $startTime = "06:00";
			                }

			                if ($shiftId == "2") {
			                    $startTime = "14:00";
			                }

			                if ($shiftId == "3") {
			                    $startTime = "22:00";
			                }
						@endphp
						@for($i=0;$i<8;$i++)
							<div class="week-day-main">
								<div class="week-day-name">
									<p>{{date("g:i A",strtotime("$startTime + $i hour"))}}</p>
								</div>
							</div>
						@endfor
					@endforeach
				</div>
			</div>
		</div>
		<div class="right-room-number">
			<div class="top-room-number-block">
				@foreach($dates as $k => $date)
					<div class="week-day-main">
						<div class="week-day-name">
							<p>{{date('D d/m',strtotime($date))}}</p>
						</div>
					</div>
				@endforeach
			</div>
			@if($layout == 'month')
				<div class="main-room-vertical-scroll">
					<div class="scroable-div">
						<div class="" style="height: 750px;"></div>
					</div>
				</div>
			@endif
			<div class="room-box-list">
				@foreach($dates as $key1 => $date)
					<div class="modal-staff-block">
						<div class="week-day-sheft">
							@foreach($tourRoom as $key => $room)
								<span class="tooltipped" data-tooltip="{{$rooms[$room]}}">{{($key)}}</span>
							@endforeach
						</div>
						<div class="block-content-row">
							@foreach($tourShift as $shiftId => $shift)
								@php
									if ($shiftId == "1") {
					                    $startTime = "06:00";
					                }

					                if ($shiftId == "2") {
					                    $startTime = "14:00";
					                }

					                if ($shiftId == "3") {
					                    $startTime = "22:00";
					                }
								@endphp
								@for($i=0;$i<8;$i++)
									@php
									$time=date("g:i A",strtotime("$startTime + $i hour"))
									@endphp
									<div class="room-box-list-row @if($i=='0' || $i=='8' || $i=='16') real-start-time @endif @if($i=='7' || $i=='15' || $i=='23') real-end-time @endif ">
										@foreach($tourRoom as $key => $room)
											@php
											$cls = " weekModelDroppable ";
											$lbl = "";
											$tooltip = "";
											$bookingId = "";
											@endphp
											@if(isset($finalData[$date][$time][$room]))
												@php
												$cls = $finalData[$date][$time][$room]['cls'];
												$lbl = $finalData[$date][$time][$room]['lbl'];
												$tooltip = $finalData[$date][$time][$room]['tooltip'];
												$bookingId = $finalData[$date][$time][$room]['booking_id'];
												@endphp
												<a href="#" class="{{$cls}}" data-record="{{($i+1)}}" data-time="{{strtotime($time)}}" data-day="{{$date}}" data-dates="{{strtotime($date)}}" data-id="{{($i+1)}}" data-row="{{$key}}" data-records="{{strtotime($date).'_'.($i+1).'_'.$key.'_'.strtotime($time)}}" data-tooltip="{!! $tooltip !!}" data-shift="{{$shiftId}}" data-room="{{$room}}" data-booking="{{$bookingId}}">
													<span data-id="{{strtotime($date).'_'.($i+1).'_'.$key.'_'.strtotime($time)}}" data-shift="{{$shiftId}}" data-room="{{$room}}" data-booking="{{$bookingId}}" ></span>
													{!! $lbl !!}
												</a>
											@else
												<a href="#" class="{{$cls}}" data-record="{{($i+1)}}" data-time="{{strtotime($time)}}" data-day="{{$date}}" data-dates="{{strtotime($date)}}" data-id="{{($i+1)}}" data-row="{{$key}}" data-records="{{strtotime($date).'_'.($i+1).'_'.$key.'_'.strtotime($time)}}" data-tooltip="{!! $tooltip !!}" data-shift="{{$shiftId}}" data-room="{{$room}}">
													<span data-id="{{strtotime($date).'_'.($i+1).'_'.$key.'_'.strtotime($time)}}" data-shift="{{$shiftId}}" data-room="{{$room}}"></span>
													{!! $lbl !!}
												</a>
											@endif
										@endforeach
									</div>
								@endfor
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endforeach
