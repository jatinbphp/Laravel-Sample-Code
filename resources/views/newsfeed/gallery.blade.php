@if(count($gallery) > 0)
	@foreach ($gallery as $key => $value)
	    <a href="#feedarea{{$key}}"><img class="responsive-img" alt="" src="{{$value}}"></a>
	@endforeach
@endif
