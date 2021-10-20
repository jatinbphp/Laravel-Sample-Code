<div class="date-selection">
	<div class="left-right-btn-booking">
		<button class="btns {{$fromClass}} leftWeekStaffBtn" data-date="{{$from}}" data-type="admin">
			<i class="material-icons">chevron_left</i>
		</button>
		<button class="btns {{$toClass}} rightWeekStaffBtn" data-date="{{$to}}" data-type="admin">
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
