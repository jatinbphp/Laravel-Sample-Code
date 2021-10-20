@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('filter')
    @include("layouts.common.filter",['closeCls' => 'closeBookingFilter','type' => 'booking','cls' => 'bookingInfo'])
@endsection

@section('content')
<div class="row">
	<div class="col s12">
		<div class="container">
			<section class="tabs-vertical mt-0 section">
				<div class="row">
					<div class="col left-content-panel">
	                    <!-- tabs  -->
	                    <div class="card-panel custom-panel">
	                       <ul class="tabs">
								<li class="tab">
									<a href="#booking-info" class="active filterBar bookingInfo" data-filter="booking" data-close="closeBookingFilter" data-cls="bookingInfo">
										<i class="material-icons">book</i>
										<span>{{trans('message.model')}} {{trans('message.booking')}}</span>
									</a>
								</li>
									<li class="tab">
									<a href="#model-working" class="filterBar weekModel weekModelFirst" data-type="index" data-filter="week-model" data-close="closeWeekModelFilter" data-cls="weekModelFirst">
										<i class="material-icons">group_work</i>
										<span>{{trans('message.model')}} {{trans('message.working')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#model-real" class="filterBar weekModel weekModelReal" data-type="real" data-filter="week-model" data-close="closeWeekModelFilter" data-cls="weekModelReal">
										<i class="material-icons">access_time</i>
										<span>{{trans('message.model')}} {{trans('message.real')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#model-break" class="filterBar weekModelBreak weekModel" data-type="break" data-filter="week-model" data-close="closeWeekModelFilter" data-cls="weekModelBreak">
										<i class="material-icons">free_breakfast</i>
										<span>{{trans('message.model')}} {{trans('message.break')}}</span>
									</a>
								</li>

								<li class="tab">
									<a href="#booking-schedule-info" class="filterBar bookingSchedule" data-close="closeStaffScheduleFilter" data-filter="staff_schedule">
										<i class="material-icons">av_timer</i>
										<span>{{trans('message.staff')}} {{trans('message.schedule')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#staff" class="filterBar weekStaff" data-type="index" data-close="closeWeekStaffFilter" data-filter="week_staff">
										<i class="material-icons">group</i>
										<span>{{trans('message.staff')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#staff-real" class="filterBar weekStaff" data-type="real" data-close="closeWeekStaffFilter" data-filter="week_staff">
										<i class="material-icons">group_add</i>
										<span>{{trans('message.staff')}} {{trans('message.real')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#staff-working" class="filterBar weekStaff" data-type="working" data-close="closeWeekStaffFilter" data-filter="week_staff">
										<i class="material-icons">perm_contact_calendar</i>
										<span>{{trans('message.staff')}} {{trans('message.working')}}</span>
									</a>
								</li>
								<li class="indicator" style="left: 0px; right: 0px;"></li>
							</ul>
	                    </div>
	                </div>
	                <div class="col right-content-block mt-0">
	                	<div id="booking-info" class="active">
							<div class="content bookingTab">

							</div>
						</div>
						<div id="model-working" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>
						<div id="model-real" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>
						<div id="model-break" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>

						<div id="booking-schedule-info" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>

						<div id="staff" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>

						<div id="staff-real" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>

						<div id="staff-working" style="display: none;">
							<div class="content bookingTab">

							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<div id="modal-booking" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.book_shift')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_booking">
            	<img src="{{ asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content modal-booking-add-content">

    </div>
</div>

<div id="modal-view-booking" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.book_shift')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal-view-booking">
            	<img src="{{ asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

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

@endsection

@push('js')
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('js/booking.js')}}"></script>
<script src="{{ asset('js/schedule.js')}}"></script>
<script src="{{ asset('js/week-model.js')}}"></script>
<script src="{{ asset('js/week-staff.js')}}"></script>
<script type="text/javascript">
(function($) {
	$('.addmore-schedule').fieldsaddmore({
		templateEle: "#schedule-addmore",
		rowEle: ".scheduleRow",
		addbtn: ".scheduleAddRow",
		removebtn: ".scheduleDeleteRow",
		min: 1,
		callbackBeforeInit: function(ele, options) {

		},
		callbackBeforeAdd: function(ele, options) {

		},
		callbackAfterAdd: function(ele, options) {

		},
		callbackBeforeAddClick: function(ele, options) {

		},
		callbackAfterAddClick: function(ele, options) {

		},
		callbackBeforeRemoveClick: function(ele, options) {

		},
		callbackAfterRemoveClick: function(ele, options) {

		}
	});
})(jQuery);
</script>

<script type="text/javascript">
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

    $(".filterNewData.filterdate-block").mCustomScrollbar({
        axis: "x",
        theme: "light-3",
        advanced: {
            autoExpandHorizontalScroll: true
        },
    });

</script>

@endpush
