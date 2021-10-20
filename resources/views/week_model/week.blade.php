@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col s12">
		<div class="container">
			<section class="tabs-vertical mt-2 section">
				<div class="row">
					<div class="col left-content-panel">
						<!-- tabs  -->
						<div class="card-panel custom-panel">
							<ul class="tabs">
								<li class="tab">
									<a href="#week_model_working" class="active">
										<i class="material-icons">account_circle</i>
										<span>{{ trans('message.model')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#week_model_real">
										<i class="material-icons">account_circle</i>
										<span>{{ trans('message.model')}} {{ trans('message.real')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#week_model_break">
										<i class="material-icons">account_circle</i>
										<span>
											{{ trans('message.model')}} {{ trans('message.break')}}
										</span>
									</a>
								</li>
								<li class="indicator" style="left: 0px; right: 0px;"></li>
							</ul>
						</div>
					</div>
					<div class="col right-content-block">
						<div id="week_model_working" class="active">
							@include("week_model.index")
						</div>
						<div id="week_model_real" style="display: none;">
							@include("week_model.real")
						</div>
						<div id="week_model_break" style="display: none;">
							@include("week_model.break")
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<div id="modal-change-booking" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.book_shift')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal-change-booking">
            	<img src="{{ asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="form-week-model-filter" name="form-week-model-filter">
	<input type="hidden" name="room_id" id="room_id" class="roomId">
	<input type="hidden" name="shift_id" id="shift_id" class="shiftId">
	<input type="hidden" name="from_date" id="from_date" class="fromDate">
	<input type="hidden" name="to_date" id="to_date" class="toDate">
	<input type="hidden" name="is_availability" id="is_availability" class="isWeekModelAvailability">
	<input type="hidden" name="model_id" id="model_id" class="modelId">
	<input type="hidden" name="trainer_id" id="trainer_id" class="trainerId">
	<input type="hidden" name="type" id="type" value="{{$type}}">
	<input type="hidden" name="layout" id="layout" value="{{$layout}}" class="weekMLayout">
</form>

@endsection

@push('js')
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('js/week-model.js')}}"></script>
@endpush
