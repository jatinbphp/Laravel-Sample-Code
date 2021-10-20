<form method="post" id="lead-form" name="lead-form">
	<div class="input-group label-inline">
		<label for="nume">{{trans('message.title')}}</label>
		<input type="text" name="nume" id="nume" />
		<span class="error" id="nume_error"></span>
	</div>
	<div class="input-group label-inline">
		<label for="descriere">{{trans('message.description')}}</label>
		<input type="text" name="descriere" id="descriere" />
		<span class="error" id="descriere_error"></span>
	</div>
	<div class="input-group label-inline">
		<label for="puncte">{{trans('message.number_of_points')}}</label>
		<input type="text" name="puncte" id="puncte" />
		<span class="error" id="puncte_error"></span>
	</div>
	<button class=" btn purple-btn submit-lead action-btn" type="submit"><img src="/img/icon-tick-white.png" alt="">{{trans('message.add')}}</button>
</form>
