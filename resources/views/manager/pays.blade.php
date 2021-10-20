@if(count($pays)>0)
	 <div class="row">
	 	<div class="col s4"> {{trans('message.model_name')}} </div>
	 	<div class="col s4"> {{trans('message.site_name')}} </div>
	 	<div class="col s4"> {{trans('message.the_amount')}} </div>
    @foreach($pays as $pay)
        <div class="row">
            <div class="col s4">{{$pay->real_name}}</div>
        	<div class="col s4">{{$pay->site_name}}</div>
            <div class="col s4">{{$pay->price}} </div>
        </div>
    @endforeach
@else
    {{trans('message.no_payments_are_available_for_this_tour')}}
@endif
