<div class="buttons-group">
	<a class=" btn k-button-fill k-btn-icon action-btn ml-4" href="{{$authUrl}}" target="_blank">
		Generate Auth
	</a>
</div>

<div class="input-group input-field k-input-text">
	<label for="auth_code">{{trans('message.auth_code')}} <span>*</span></label>
	<input type="text" name="auth_code" id="auth_code" class="validate k-txt-box" />
	<span class="error k-error" id="client_secret_error"></span>
</div>

<div class="buttons-group">
	<button class=" btn k-button-fill k-btn-icon saveGmailConfig action-btn ml-4" type="submit">
	<img src="/img/icon-tick-white.png" alt="">{{trans('message.add')}}
	</button>
</div>
