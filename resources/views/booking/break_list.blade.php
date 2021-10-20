@if($tour_breaks != null)
    @foreach($tour_breaks as $key => $rule)
        @include('booking.addmore',['addmore'=>$rule,'key' => ($key+1),'tour_hour_id',$tour_hour_id])
    @endforeach
@else
    @include('booking.addmore',['key' => 1,'tour_hour_id',$tour_hour_id])
@endif
