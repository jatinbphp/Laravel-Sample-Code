<div class="scheduleRow rowId-{{$key}}" data-value="{{$key}}">
	<div class="row block-row-relative add-more-block-In">
		<div class="add-more-feild-block">
			<div class="input-field col s2 p-cus w-20-width k-input-text">
				<label for="no_of_day" class="active">{{ trans('message.number_of_days') }}<span>*</span></label>

				<input   id="rules[{{$key}}][{{isset($rule->id) ? $rule->id:''}}]" name="rules[{{$key}}][id]" type="hidden"  value="{{isset($rule->id) ? $rule->id:''}}" >

				<input placeholder="Placeholder" id="rules[{{$key}}][no_of_day]" name="rules[{{$key}}][no_of_day]" type="text" class="validate numeric fill-input" value="{{isset($rule->no_of_days) ? $rule->no_of_days:''}}" maxlength="3">
				<span class="k-error error" id="rules_{{$key}}_no_of_day_error"></span>
			</div>
			<div class="input-field col s2 p-cus w-20-width k-input-text">
				<div class="switch k-switch k-switch-green k-switch-with-label schule-switch-witho-label">
					<label for="first_name" class="active">{{ trans('message.type') }} <span>*</span></label>
					<label>
						<input type="checkbox" name="rules[{{$key}}][type]" id="rules[{{$key}}][type]" value="1" class="switchinput" @if(isset($rule) && $rule->type=='1') checked='checked' @endif>
						<span class="lever m-0"></span>
					</label>
					<span class="k-error error" id="rules_{{$key}}_type_error"></span>
				</div>
			</div>
			<div class="input-field col s2 p-cus w-20-width k-dropdown">
				<label for="first_name" class="active">{{ trans('message.arrival_time') }} <span>*</span></label>
				<select name="rules[{{$key}}][arrival_time]" id="rules[key][arrival_time]" class="browser-default">
					<option value="" selected>{{trans('message.select')}}</option>
					@for($i=0;$i<=23;$i++)
						@php
						$time = date("g:i A",strtotime("06:00 + $i hour"))
						@endphp
							<option value="{{$time}}" @if(isset($rule) && $rule->arrival_time == $time) selected='selected' @endif>
								{{$time}}
							</option>
					@endfor
				</select>
				<span class="k-error error" id="rules_{{$key}}_arrival_time_error"></span>
			</div>
			<div class="input-field col s2 p-cus w-20-width k-dropdown">
				<label for="first_name" class="active">{{trans('message.departure_time')}} <span>*</span></label>
				<select name="rules[{{$key}}][departure_time]" id="rules[key][departure_time]" class="browser-default">
					<option value="" selected>{{trans('message.select')}}</option>
					@for($i=0;$i<=23;$i++)
						@php
						$time = date("g:i A",strtotime("06:00 + $i hour"))
						@endphp
							<option value="{{$time}}" @if(isset($rule) && $rule->departure_time == $time) selected='selected' @endif>
								{{$time}}
							</option>
					@endfor
				</select>
				<span class="k-error error" id="rules_{{$key}}_departure_time_error"></span>
			</div>
			<div class="input-field col s2 p-cus w-20-width k-input-text">
				<div class="switch k-switch k-switch-green k-switch-with-label schule-switch-witho-label">
					<label for="first_name" class="active">{{trans('message.repetitive')}} <span>*</span></label>
					<label>
						<input type="checkbox" name="rules[{{$key}}][repetitive]" id="rules[{{$key}}][repetitive]" value="1" class="switchinput" @if(isset($rule) && $rule->repetitive=='1') checked='checked' @endif>
						<span class="lever m-0"></span>
					</label>
					<span class="k-error error" id="rules_key_repetitive_error"></span>
				</div>
			</div>
		</div>

		<div class="input-field col s2 p-cus w-auto-width">
			<div class="add-row-button">
				<a href="#" data-rowid="{{$key}}" class="scheduleDeleteRow" data-url="schedule/delete/" data-id="{{isset($rule->id) ? $rule->id:''}}">-</a>
			</div>
		</div>
	</div>
	<hr>
</div>
