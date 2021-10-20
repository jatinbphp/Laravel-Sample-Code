@if(isset($trainingTemplate))
	<div class="row">
		<div class="input-field col s12 k-input-text">
		  <label for="name3">
		    {{trans('message.training')}} {{trans('message.request')}} <span>*</span>
		  </label>
		  <div id="training_template" name="training_template">
		      {!! $trainingTemplate !!}
		  </div>
		</div>
	</div>
@endif

@if(isset($spacesTemplate))
	<div class="row">
		<div class="input-field col s12 k-input-text">
		  <label for="name3">
		    {{trans('message.spaces')}} {{trans('message.request')}} <span>*</span>
		  </label>
		  <div id="spaces_template" name="spaces_template">
		      {!! $spacesTemplate !!}
		  </div>
		</div>
	</div>
@endif
