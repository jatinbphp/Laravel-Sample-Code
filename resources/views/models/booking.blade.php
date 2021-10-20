@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12">
		<div class="container">
			<div class="card scrollspy border-radius-6   booking_class">
					<div class="nav-group calender-filter">
						<div class="date-filter-selection dateSelection">
							@include("models.date",['from'=>$from,'to' => $to])
						</div>
						<div class="filter-text">
							<p><img src="{{ asset('img/bell-1.png')}}">{{ trans('message.you_have_chose') }} <span class="heigh-listed-span"> <span id="shiftCount">{{$shiftCount}}</span>/5 {{ trans('message.shifts') }}</span>. {{ trans('message.one_needs_approval_from_manager') }}.</p>
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

							<div class="filterData filterdate-block">

							</div>

							<!-- Dropdown Trigger -->
							<div class="button-triggle-parent">
							  <a class='dropdown-trigger modal-filter-add-btn' href='#' data-target='filter-option'>{{ trans('message.add_filter') }}!</a>
							  <!-- Dropdown Structure -->
							  <ul id='filter-option' class='dropdown-content modal-filter-dropdown'>
							    <li class="li-room">
							    	<a href="#" class="filterValue" data-type="room" data-area="models">{{ trans('message.room') }}</a>
							    </li>
							    <li class="li-avalibility">
							    	<a href="#" class="filterValue" data-type="avalibility" data-area="models">{{ trans('message.availability') }}</a>
							    </li>
							    <li class="li-shift">
							    	<a href="#" class="filterValue" data-type="shift" data-area="models">{{ trans('message.shift') }}</a>
							    </li>
							  </ul>
							 </div>
						</div>
					</div>

					<!-- Dropdown Structure -->
				  	<ul id='roomDropDown' class='dropdown-content  dropdown-with-checkbox modal-filter-dropdown'>
				  		@foreach($rooms as $key => $room)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$key}} data-type="models" value="{{$key}}" class="filled-in roomDropdown" name="roomCheckbox" id="roomCheckbox_{{$key}}" multiple="multiple" />
							        <span>{{$room}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

				  	<!-- Dropdown Structure -->
				  	<ul id='shiftDropDown' class='dropdown-content  dropdown-with-checkbox modal-filter-dropdown'>
				  		@foreach($shifts as $k => $shift)
				    		<li>
				    			<label class="k-checkbox-fill">
							        <input type="checkbox" data-id={{$k}} data-type="models" value="{{$k}}" class="filled-in bookingDropdown" name="shiftCheckbox" id="shiftCheckbox_{{$k}}" multiple="multiple" />
							        <span>{{$shift}}</span>
							    </label>
				    		</li>
				    	@endforeach
				  	</ul>

					<form id="form-booking-filter" name="form-booking-filter">
						<input type="hidden" name="room_id" id="room_id" class="roomId">
						<input type="hidden" name="shift_id" id="shift_id" class="shiftId">
						<input type="hidden" name="from_date" id="from_date" class="fromDate">
						<input type="hidden" name="to_date" id="to_date" class="toDate">
						<input type="hidden" name="is_availability" id="is_availability" class="isAvailability">
					</form>
					<div class="calender-block">
						@include("models.calender",['rooms'=>$rooms,'dates' => $dates,'shifts' => $shifts,'finalData' => $finalData,'isAvailability' => $isAvailability])
					</div>
				</div>

		</div>
	</div>
</div>

<div id="model-view-booking" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.book_shift')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-model-view-booking">
            	<img src="{{ asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script src="{{ asset('js/booking.js')}}"></script>
@endpush
