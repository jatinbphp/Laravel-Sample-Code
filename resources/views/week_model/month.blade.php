@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush
@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12">
		<div class="container">
			<div class="">
				<div class="header-group filter-group-box">
					<div class="nav-group calender-filter">
						<div class="date-filter-selection dateWeekModelSelection">
							@include("week_model.date",['from'=>$from,'to' => $to])
						</div>
						<div class="filter-month-day">
							<div class="filter-block-today-top">
								<button>{{ trans('message.today') }}</button>
								  <div class="input-field">
								    <select id="change-layout" name="change-layout" class="changeWeekModelLayout">
								      <option value="day" @if($layout=="day") selected='selected'@endif>{{ trans('message.day') }}</option>
								      <option value="week" @if($layout=="week") selected='selected'@endif>{{ trans('message.week') }}</option>
								      <option value="month" @if($layout=="month") selected='selected'@endif>{{ trans('message.month') }}</option>
								    </select>
								  </div>
							</div>
						</div>
					</div>
					<div class="boking-filter-row">
						<div class="booking-filter-block">
							<a href="#" class="main-filter-btn">
								<span>
									<img src="{{ asset('img/filter.png')}}">
								</span>
								{{ trans('message.filter_by') }} :
							</a>

							<div class="filterWeekModelData filterdate-block">

							</div>

							<!-- Dropdown Trigger -->
							<div class="button-triggle-parent">
							  <a class='dropdown-trigger modal-filter-add-btn' href='#' data-target='filter-option'>{{ trans('message.add_filter') }}!</a>
							  <!-- Dropdown Structure -->
							  <ul id='filter-option' class='dropdown-content  modal-filter-dropdown'>
							    <li class="li-room">
							    	<a href="#" class="filterWeekModelValue" data-type="room" data-area="admin">{{ trans('message.room') }}</a>
							    </li>
							    <li class="li-avalibility">
							    	<a href="#" class="filterWeekModelValue" data-type="avalibility" data-area="admin">{{ trans('message.availability') }}</a>
							    </li>
							    <li class="li-shift">
							    	<a href="#" class="filterWeekModelValue" data-type="shift" data-area="admin">{{ trans('message.shift') }}</a>
							    </li>
							    <li class="li-model">
							    	<a href="#" class="filterWeekModelValue" data-type="model" data-area="admin">{{ trans('message.model') }}</a>
							    </li>
							    <li class="li-trainer">
							    	<a href="#" class="filterWeekModelValue" data-type="trainer" data-area="admin">{{ trans('message.trainer') }}</a>
							    </li>
							  </ul>
							</div>
						</div>
					</div>

					<!-- Dropdown Structure -->
				  	<ul id='roomWeekModelDropDown' class='dropdown-content dropdown-with-checkbox  modal-filter-dropdown'>
				  		@foreach($rooms as $key => $room)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$key}} value="{{$key}}" class="filled-in roomWeekModelDropdown" name="roomCheckbox" id="roomCheckbox_{{$key}}" multiple="multiple" />
							        <span>{{$room}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

				  	<!-- Dropdown Structure -->
				  	<ul id='shiftWeekModelDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
				  		@foreach($shifts as $k => $shift)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$k}} value="{{$k}}" class="filled-in bookingWeekModelDropdown" name="shiftCheckbox" id="shiftCheckbox_{{$k}}" multiple="multiple" />
							        <span>{{$shift}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

				  	<!-- Dropdown Structure -->
				  	<ul id='modelWeekModelDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
				  		@foreach($models as $mkey => $model)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$mkey}} value="{{$mkey}}" class="filled-in modelWeekModelDropdown" name="modelCheckbox" id="modelCheckbox_{{$mkey}}" multiple="multiple" />
							        <span>{{$model}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

				  	<!-- Dropdown Structure -->
				  	<ul id='trainerWeekModelDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
				  		@foreach($trainers as $tkey => $trainer)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$tkey}} value="{{$tkey}}" class="filled-in trainerWeekModelDropdown" name="trainerCheckbox" id="trainerCheckbox_{{$tkey}}" multiple="multiple" />
							        <span>{{$trainer}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

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
					<div class="calender-main-container">
						@for($r=1;$r<5;$r++)
							<div class="calender-block weekModelView modal-staff-shadual-block ">
								<div class="caldern-top-row-block {{$layoutCls}} month-view-modal">
									<div class="left-part-block-room">
										<div class="top-left-part">
											<p>Room</p>
										</div>
										<div class="hours-listing">
											<div class="scrroll-block">
												@foreach($tourShift as $shiftId => $shift)
													@php
														if ($shiftId == "1") {
										                    $startTime = "06:00";
										                }

										                if ($shiftId == "2") {
										                    $startTime = "14:00";
										                }

										                if ($shiftId == "3") {
										                    $startTime = "22:00";
										                }
													@endphp
													@for($i=0;$i<8;$i++)
														<div class="week-day-main">
															<div class="week-day-name">
																<p>{{date("g:i A",strtotime("$startTime + $i hour"))}}</p>
															</div>
														</div>
													@endfor
												@endforeach
											</div>
										</div>
									</div>
									<div class="right-room-number">
										<div class="top-room-number-block">
											@foreach($dates as $k => $date)
												<div class="week-day-main">
													<div class="week-day-name">
														<p>{{date('D d/m',strtotime($date))}}</p>
													</div>
												</div>
											@endforeach
										</div>
										<div class="main-room-vertical-scroll">
											<div class="scroable-div">
												<div class="" style="height: 750px;"></div>
											</div>
										</div>
										<div class="room-box-list">
											@foreach($dates as $key1 => $date)
												<div class="modal-staff-block">
													<div class="week-day-sheft">
														@foreach($tourRoom as $key => $room)
															<span class="tooltipped" data-tooltip="{{$rooms[$room]}}">{{($key)}}</span>
														@endforeach
													</div>
													<div class="block-content-row">
														@foreach($tourShift as $shiftId => $shift)
															@php
																if ($shiftId == "1") {
												                    $startTime = "06:00";
												                }

												                if ($shiftId == "2") {
												                    $startTime = "14:00";
												                }

												                if ($shiftId == "3") {
												                    $startTime = "22:00";
												                }
															@endphp
															@for($i=0;$i<8;$i++)
																@php
																$time=date("g:i A",strtotime("$startTime + $i hour"))
																@endphp
																<div class="room-box-list-row @if($i=='0' || $i=='8' || $i=='16') real-start-time @endif @if($i=='7' || $i=='15' || $i=='23') real-end-time @endif ">
																	@foreach($tourRoom as $key => $room)
																		@php
																		$cls = "";
																		$lbl = "";
																		$tooltip = "";
																		@endphp
																		@if(isset($finalData[$date][$time][$room]))
																		@php
																		$cls = $finalData[$date][$time][$room]['cls'];
																		$lbl = $finalData[$date][$time][$room]['lbl'];
																		$tooltip = $finalData[$date][$time][$room]['tooltip'];
																		@endphp
																		@endif
																		<a href="#" class="{{$cls}}" data-tooltip="{!! $tooltip !!}">
																			<span></span>
																			{!! $lbl !!}
																		</a>
																	@endforeach
																</div>
															@endfor
														@endforeach
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/week-model.js')}}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript">
	$(".month-view-modal .modal-staff-block").mCustomScrollbar({
		axis:"x",
		theme:"light-3",
		advanced:{autoExpandHorizontalScroll:true},

	});
	$(".scroable-div").mCustomScrollbar({
		axis:"y",
		theme:"light-3",
		advanced:{autoExpandHorizontalScroll:true},
		callbacks:{
			whileScrolling:function(){
				$(this).parent().parent().parent().find(".hours-listing .scrroll-block").css("top",this.mcs.top);
				$(this).parent().parent().find(".block-content-row").css("top",this.mcs.top);
			},
			alwaysTriggerOffsets:false
		}
	});
	// $(".month-view-modal .room-box-list").mCustomScrollbar({
	// 	axis:"y",
	// 	theme:"light-3",
	// 	callbacks:{
	// 		whileScrolling:function(){
	// 			$(".month-view-modal .hours-listing .scrroll-block").css("top",this.mcs.top);
	// 		},
	// 		alwaysTriggerOffsets:false
	// 	}

	// });

</script>
@endpush
