<div class="caldern-top-row-block">
	<div class="left-part-block-room">
		<div class="top-left-part">
			<p>{{trans('message.room')}}</p>
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
				</div>
			@endforeach
		</div>
		@yield('model_content')
	</div>
</div>
