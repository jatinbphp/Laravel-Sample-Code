<div class="date-selection">
	<div class="left-right-btn-booking">
		<button class="btns {{$fromClass}} leftBookBtn" data-date="{{$from}}" data-area="admin">
			<i class="material-icons">chevron_left</i>
		</button>
		<button class="btns {{$toClass}} rightBookBtn" data-date="{{$to}}" data-area="admin">
			<i class="material-icons">chevron_right</i>
		</button>
	</div>
	<p class="dateString">	{{date('d',strtotime($from))}} - {{date('d F , 	Y',strtotime($to))}}
	</p>
</div>
