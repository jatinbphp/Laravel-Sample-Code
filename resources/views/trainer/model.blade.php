<section class="tabs-vertical mt-70 section">
	<div class="row">
		<div class="col left-content-panel">
			<!-- tabs  -->
			<div class="card-panel custom-panel">
				@if(count($get_model) > 0)
					<ul class="tabs model-tab">
						@foreach($get_model as $key => $model)
							<li class="tab ">
								<a href="#{{$model->id}}-tab" class="active activeModelInfo" data-id="{{$model->id}}">
									<i class="material-icons">account_circle</i>
									<span>
										{{$model->real_name}}
									</span>
								</a>
							</li>
						@endforeach
						<li class="indicator" style="left: 0px; right: 0px;"></li>
					</ul>
				@endif
			</div>
		</div>
		<div class="col right-content-block" style="margin-top:0px;">
			@if(count($get_model) > 0)
				@foreach($get_model as $key => $model)
					<div id="{{$model->id}}-tab" class="@if($key =='0') 'active' @endif trainerModelInfo{{$model->id}}" style="@if($key > 0) display: none; @endif">
						<div class="row">
							<div class="col s12">
								<div class="models-dashboard">
									<div class="card-with-header">
										<div class="content model-info new-model-block-section">
											@if($key == '0')
												@include("trainer.model-info",['modelUser' => $modelUser,'questions' => $questions,'answers'=> $answers])
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</section>
