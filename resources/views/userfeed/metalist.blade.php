<div class="scheduleRow rowId" data-value="key">
	<div class="row block-row-relative add-more-block-In">
		<div class="add-more-feild-block">
		<div class="input-field col s6 p-cus  k-input-text">
			<label for="key">
			{{trans('message.key')}} <span>*</span>
			</label>
				<input id="metadata[key][cheie]" name="metadata[key][cheie]" type="text" class="validate k-txt-box"   placeholder="{{trans('message.key')}}">
			<span class="error k-error" id="metadata_key_cheie_error">
			</span>
		</div>

		<div class="input-field col s6 p-cus  k-input-text">
			<label for="value"> {{trans('message.value')}} <span>*</span></label>
			<input id="metadata[key][valoare]" name="metadata[key][valoare]" type="text" class="validate k-txt-box"  placeholder="{{trans('message.value')}}">
		<span class="error k-error" id="metadata_key_valoare_error"></span>
		</div>
	</div>
		<div class="input-field col s2 p-cus w-auto-width">
			<div class="add-row-button">
				<a href="#" data-rowid="key" class="scheduleDeleteRow">-</a>
			</div>
		</div>
	</div>
	<hr>
</div>
