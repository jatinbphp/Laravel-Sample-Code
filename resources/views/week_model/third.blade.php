@foreach($weekData as $key => $finalData)
	@php
		$dates = array_keys($finalData);
	@endphp
	<div class="caldern-top-row-block {{$layoutCls}}">
		<div class="left-part-block-room">
			<div class="top-left-part">
				<p>Room</p>
			</div>
			<div class="hours-listing">
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
											$cls = "";
											$lbl = "";
											$tooltip = "";
											$break = "";
											@endphp
											@if(isset($finalData[$date][$time][$room]))
												@php
												$cls = $finalData[$date][$time][$room]['cls'];
												$lbl = $finalData[$date][$time][$room]['lbl'];
												$tooltip = $finalData[$date][$time][$room]['tooltip'];
												$break = (isset($finalData[$date][$time][$room]['break']) ? $finalData[$date][$time][$room]['break']:"");
												@endphp
											@endif
											<a href="#" class="{{$cls}}" data-tooltip="{!! $tooltip !!}">
												<span></span>
												{!! $lbl !!}
												{!! $break !!}
											</a>
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
