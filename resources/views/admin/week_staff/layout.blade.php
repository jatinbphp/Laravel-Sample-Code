<div class="section groups-container" id="user-profile">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="row">
        <div class="col s12">

            <div class="card scrollspy border-radius-6 overflow-unset mt-0">
                <div class="nav-group calender-filter">
					<div class="date-filter-selection dateWeekStaffSelection">
						@include("week_staff.date",['from'=>$from,'to' => $to])
					</div>
					<div class="filter-month-day">
						<div class="filter-block-today-top">
							  <button>{{ trans('message.today') }}</button>
							  <div class="input-field k-dropdown k-not-label">
							  	<select id="change-layout" name="change-layout" class="changeWeekStaffLayout browser-default">
							      <option value="day" @if($layout=="day") selected='selected'@endif>
							      		{{ trans('message.day') }}
							      </option>
							      <option value="week" @if($layout=="week") selected='selected'@endif>{{ trans('message.week') }}</option>
							      <option value="month" @if($layout=="month") selected='selected'@endif>{{ trans('message.month') }}</option>
							    </select>
							  </div>
						</div>
					</div>
				</div>

				<div class="calender-main-container">
					<div class="calender-block weekStaffView">
						@yield('staff_content')
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div id="modal-holiday" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.holiday')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal-holiday">
            	<img src="{{ asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="form-week-staff-filter" name="form-week-staff-filter">
	<input type="hidden" name="from_date" id="from_date" class="fromDate">
	<input type="hidden" name="to_date" id="to_date" class="toDate">
	<input type="hidden" name="type" id="type" value="{{$type}}">
	<input type="hidden" name="layout" id="layout" value="{{$layout}}" class="weekSLayout">
</form>
