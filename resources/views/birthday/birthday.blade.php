<div class="birthdays-info">
	@if(count($user['today']) > 0)
		@foreach($user['today'] as $elem)
			<p>{{trans('message.today_is_her_birthday')}} <a href="#">{{$elem->real_name}}</a>!</p>
		@endforeach
	@endif

	@foreach($user['next'] as $elem)
		@php
		list($year,$month,$day)=explode('/',$elem->birthday);
		$date=date('Y')."-".$month . "-".$day;
		@endphp
		<p>{{trans('message.over')}} {{gmdate('d',strtotime($date) - strtotime(date('Y-m-d'))-86400)}} {{trans('message.days_is_the_birthday_of')}} <a href="#">{{$elem->real_name}}</a>.</p>
	@endforeach
</div>
