@foreach($days as $dayId => $day)
	<div class="input-field col s3 k-input-text paymentDay{{$day}}">
		<label for="day_{{$day}}">
			@if($dayId != 0)
			<span class="input-appendicons">+</span>
			@endif
			{{trans('message.day')}} {{$day}}(%) <span>*</span>
		</label>
			<div class="input-wrap">
		<input id="day_{{$day}}" name="day_{{$day}}" type="text" class="validate k-txt-box numeric percentageAmout" @if(isset($data["day_$day"])) value='{{$data["day_$day"]}}' @endif maxlength="3" placeholder="% {{trans('message.amount')}}">
			</div>
		<span class="error k-error" id="day_{{$day}}_error">
		</span>
	</div>
@endforeach

<div class="input-field col s3 k-input-text">
	<label for="day">
		<span class="input-appendicons">=</span>
		{{trans('message.total')}}(%)
	</label>

	<input id="total" name="total" type="text" class="validate k-txt-box numeric totalPercentage" maxlength="3" readonly="readonly" placeholder="{{trans('message.total')}}" @if(isset($data["total"])) value='{{$data["total"]}}' @endif>
	<span class="error k-error" id="total_error">
	</span>
</div>
