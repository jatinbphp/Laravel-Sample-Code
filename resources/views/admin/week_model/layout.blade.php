<div class="section groups-container" id="user-profile">
	<div class="row">
		<div class="col s12">
			<div class="card scrollspy border-radius-6 overflow-unset mt-0">

				<div class="nav-group calender-filter">
					<div class="date-filter-selection dateWeekModelSelection">
						@include("week_model.date",['from'=>$from,'to' => $to])
					</div>
					<div class="filter-month-day">
						<div class="filter-block-today-top">
							<button>{{ trans('message.today') }}</button>
							<div class="input-field k-dropdown k-not-label">
								<select id="change-layout" name="change-layout" class="changeWeekModelLayout browser-default">
									<option value="day" @if($layout=="day") selected='selected' @endif>{{ trans('message.day') }}</option>
									<option value="week" @if($layout=="week") selected='selected' @endif>{{ trans('message.week') }}</option>
									<option value="month" @if($layout=="month") selected='selected' @endif>{{ trans('message.month') }}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="calender-main-container">
					<div class="calender-block weekModelView modal-staff-shadual-block">
						@yield('model_content')
					</div>
				</div>

			</div>
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
