@foreach($weekData as $key => $finalData)
	@php
		$dates = array_keys($finalData);
	@endphp
	<div class="calender-block staff-block-calender">
		<div class="caldern-top-row-block">
			<div class="left-part-block-room">
				<div class="top-left-part">
					<p>{{ trans('message.staff') }}</p>
				</div>
				<div class="hours-listing">
					<div class="scrroll-block">
						@for($time=0;$time<24;$time++)
							<div class="week-day-main">
								<div class="week-day-name">
									<p>{{date("g:i A",strtotime("06:00 + $time hour"))}}</p>
								</div>
							</div>
						@endfor
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
							<div class="week-day-sheft">
								@foreach(['TT','PT','PH','TH','M'] as $k => $stf)
									<span>{{$stf}}</span>
								@endforeach
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
					<div class="block-content-row">
						@for($i=0;$i<24;$i++)
							@php
								$time = date("g:i A",strtotime("06:00 + $i hour"))
							@endphp
								<div class="room-box-list-row">
									@foreach($dates as $k => $date)
										@foreach(['TT','PT','PH','TH','M'] as $k => $stf)
											@php
												$cls = "";
												$tooltip = "";
												$shiftCls = "";
											@endphp

											@if(isset($finalData[$date][$stf]['hours']) && in_array($time,$finalData[$date][$stf]['hours']))
												@php
													$cls = $finalData[$date][$stf]['color'];
													$tooltip = $finalData[$date][$stf]['tooltip'];
												@endphp
											@endif


											@if(isset($finalData[$date][$stf]['working_hours']) && in_array($time,$finalData[$date][$stf]['working_hours']))
												@php
													$shiftCls = $finalData[$date][$stf]['shift_color'];
												@endphp
											@endif

											<a href="#" class="{{$cls}} {{$shiftCls}}" data-tooltip="{!! $tooltip !!}">
												<span></span>
											</a>
										@endforeach
									@endforeach
								</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
