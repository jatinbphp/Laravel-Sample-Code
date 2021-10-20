@if(count($trainers)>0)
	<input type="hidden" id="program_id" value="{{$program_id}}" />
	<select id="trainers" style="display:block">
	    <option value="-1" selected >{{trans('message.choose_the_trainer')}}</option>
	    @foreach($trainers as $trainer)
	    <option value="{{$trainer->id}}">{{$trainer->name}}</option>
	    @endforeach
	</select>
	<button class='adauga'>{{trans('message.associate_trainer')}}</button>
@else
	{{trans('message.we_dont_have_a_matching_trainer')}}
@endif
