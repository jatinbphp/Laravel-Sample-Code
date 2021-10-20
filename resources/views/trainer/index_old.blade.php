@extends('layouts.app')


@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
            		<!--  Target Trainer si alte date -->
            	<div class="card-panel border-radius-6 card-inner-continer mt-1">
				<div class="row vertical-modern-dashboard admin-board-top-section">

				</div>

				@include("layouts.common.button")

				<section class="tabs-vertical mt-70 section">
					<div class="row">
						<div class="col left-content-panel">
							<!-- tabs  -->
							<div class="card-panel custom-panel">
								<ul class="tabs">
									@if(count($get_model) > 0)
										@foreach($get_model as $key => $model)
											<li class="tab">
												<a href="#{{$model->id}}-tab" class="active activeModelInfo" data-id="{{$model->id}}">
													<i class="material-icons">account_circle</i>
													<span>
														{{$model->real_name}}
													</span>
												</a>
											</li>
										@endforeach
									@endif
									<li class="indicator" style="left: 0px; right: 0px;"></li>
								</ul>
							</div>
						</div>
						<div class="col right-content-block" style="margin-top:0px;">
							@if(count($get_model) > 0)
								@foreach($get_model as $key => $model)
								<div id="{{$model->id}}-tab" class="@if($key =='0') 'active' @endif trainerModelInfo{{$model->id}}" @if($key > 0) style="display: none;"  @endif>
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

				@include("layouts.common.tab")

            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

<script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/charts-chartjs.js')}}"></script>

<script src="{{ asset('clock/clock.js')}}"></script>
<script src="{{ asset('js/cost.js')}}"></script>
<script src="{{ asset('js/obeservation.js')}}"></script>
@endpush
