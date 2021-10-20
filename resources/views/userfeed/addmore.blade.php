<div class="scheduleRow rowId-{{$key}}" data-value="{{$key}}">
	<div class="row block-row-relative add-more-block-In">
		<div class="add-more-feild-block">
			
			<input   id="metadata[{{$key}}][{{isset($metadata->id) ? $metadata->id:''}}}]" name="metadata[{{$key}}][id]" type="hidden"  value="{{isset($metadata->id) ? $metadata->id:''}}" >
			
			<div class="input-field col s6 k-input-text">
				<label for="key">
					{{trans('message.key')}} <span>*</span>
				</label>
				<input id="metadata[{{$key}}][cheie]" name="metadata[{{$key}}][cheie]" type="text" class="validate k-txt-box" value="{{ isset($metadata->cheie) ? $metadata->cheie : ''}}" placeholder="{{trans('message.key')}}">
				<span class="error k-error" id="metadata_{{ $key }}_cheie_error"></span>
			</div>
			
			<div class="input-field col s6 k-input-text">
				<label for="value"> {{trans('message.value')}} <span>*</span></label>
				<input id="metadata[{{$key}}][valoare]" name="metadata[{{$key}}][valoare]" type="text" class="validate k-txt-box" value="{{ isset($metadata->valoare) ? $metadata->valoare : ''}}" placeholder="{{trans('message.value')}}">
				<span class="error k-error" id="metadata_{{ $key }}_valoare_error"></span>
			</div>
		
		</div>

		<div class="input-field col s2 p-cus w-auto-width">
			<div class="add-row-button">
				<a href="#" data-rowid="{{$key}}" class="scheduleDeleteRow" data-url="userfeed/{{$secretId}}/delmetauser/" data-id="{{isset($metadata->id) ? $metadata->id:''}}">-</a>
			</div>
		</div>
	</div>

</div>
