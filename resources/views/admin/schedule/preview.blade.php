<div class="card filter-group-box overflow-hidden border-radius-6">
	<div class="nav-group calender-filter">
		<div class="date-filter-selection dateSelection">
			<div class="date-selection">
				<div class="left-right-btn-booking">
					<button class="btns {{$fromClass}} leftBookingScheduleBtn" data-date="{{$from}}">
					<i class="material-icons">chevron_left</i>
					</button>
					<button class="btns {{$toClass}} rightBookingScheduleBtn" data-date="{{$to}}">
					<i class="material-icons">chevron_right</i>
					</button>
				</div>
				<p class="dateString">
					@if($layout =='day')
					{{date('d F , 	Y',strtotime($date))}}
					@else
					{{date('d F ',strtotime($from))}} - {{date('d F , 	Y',strtotime($to))}}
					@endif
				</p>
			</div>
		</div>
		<div class="filter-month-day">
			<div class="filter-block-today-top">
				<div class="input-field">
					<select id="change-layout" name="change-layout" class="changeScheduleLayout">
						<option value="day" @if($layout=="day") selected='selected'@endif>{{ trans('message.day') }}</option>
						<option value="week" @if($layout=="week") selected='selected'@endif>{{ trans('message.week') }}</option>
						<option value="month" @if($layout=="month") selected='selected'@endif>{{ trans('message.month') }}</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="boking-filter-row">
	</div>
	@foreach($weekData as $key => $finalData)
	@php
	$dates = array_keys($finalData);
	@endphp
	<div class="calender-block staff-block-calender">
		<div class="caldern-top-row-block">
			<div class="left-part-block-room">
				<div class="top-left-part">
					<p>Staff</p>
				</div>
				<div class="hours-listing">
					@for($time=0;$time<24;$time++)
					<div class="week-day-main">
						<div class="week-day-name">
							<p>{{date("g:i A",strtotime("06:00 + $time hour"))}}</p>
						</div>
					</div>
					@endfor
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
				<div class="room-box-list">
					@for($i=0;$i<24;$i++)
					@php
					$time = date("g:i A",strtotime("06:00 + $i hour"))
					@endphp
					<div class="room-box-list-row">
						@foreach($dates as $k => $date)
						@foreach(['TT','PT','PH','TH','M'] as $k => $stf)
						@php
						$cls = "";
						@endphp
						@if(isset($finalData[$date][$stf]['hours']) && in_array($time,$finalData[$date][$stf]['hours']))
						@php
						$cls = $finalData[$date][$stf]['color'];
						@endphp
						@endif
						<a href="#" class="{{$cls}}">
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
	@endforeach
</div>
