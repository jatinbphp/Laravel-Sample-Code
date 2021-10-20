@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12">
		<div class="container">
			<div class="top-filter-block-main-new">
				<div class="boking-filter-row">
					<div class="booking-filter-block">
						<a href="#" class="main-filter-btn">
							<span>
								 <img src="{{ asset('img/filter.png')}}">
							</span>
							 {{trans('message.filter_by')}} :
						</a>

						<div class="filterWeekModelData filterdate-block">

						</div>

						<!-- Dropdown Trigger -->
						<div class="button-triggle-parent">
						  <a class="dropdown-trigger modal-filter-add-btn" href="#" data-target="filter-option">{{trans('message.add')}}  {{trans('message.filter')}} !</a>
						  <!-- Dropdown Structure -->
						  <ul id="filter-option" class="dropdown-content  modal-filter-dropdown">
						    <li class="li-room">
						    	<a href="#" class="filterWeekModelValue" data-type="room" data-area="admin">Room</a>
						    </li>
						    <li class="li-avalibility">
						    	<a href="#" class="filterWeekModelValue" data-type="avalibility" data-area="admin">Availability</a>
						    </li>
						    <li class="li-shift">
						    	<a href="#" class="filterWeekModelValue" data-type="shift" data-area="admin">Shift</a>
						    </li>
						    <li class="li-model">
						    	<a href="#" class="filterWeekModelValue" data-type="model" data-area="admin">Model</a>
						    </li>
						    <li class="li-trainer">
						    	<a href="#" class="filterWeekModelValue" data-type="trainer" data-area="admin">Trainer</a>
						    </li>
						  </ul>
						</div>
					</div>
					<!-- <div class="filter-btn-list">
						<ul>
							<li>
								<button>
									  <i class="material-icons">sort</i>
									  <span>Segment</span>
								</button>
							</li>
							<li>
								<button>
									  <i class="material-icons">view_column</i>
									  <span>coulmns</span>
								</button>
							</li>
							<li>
								<button>
									  <i class="material-icons">insert_chart</i>
									  <span>Reports</span>
								</button>
							</li>
							<li>
								<button>
									  <i class="material-icons">file_download</i>
									  <span>Download</span>
								</button>
							</li>
							<li>
								<button>
									  <i class="material-icons">fullscreen</i>
									  <span>Expand</span>
								</button>
							</li>
							<li>
								<button>
									  <i class="material-icons">more_vert</i>
									  <span>More</span>
								</button>
							</li>
						</ul>
					</div> -->
				</div>
			</div>
			<section class="tabs-vertical mt-2 section without-profile">
				<div class="row">
					<div class="col left-content-panel">
	                    <!-- tabs  -->
	                    <div class="card-panel custom-panel">
	                        <ul class="tabs">
	                            <li class="tab">
	                                <a href="#general" class="active">
	                                <i class="material-icons">brightness_low</i>
	                                <span>General</span>
	                                </a>
	                            </li>
	                            <li class="tab">
	                                <a href="#change-password">
	                                <i class="material-icons">lock_open</i>
	                                <span>Change Password</span>
	                                </a>
	                            </li>
	                            <li class="tab">
	                                <a href="#info">
	                                <i class="material-icons">error_outline</i>
	                                <span> Info</span>
	                                </a>
	                            </li>
	                            <li class="tab">
	                                <a href="#social-link">
	                                <i class="material-icons">chat_bubble_outline</i>
	                                <span>Social Links</span>
	                                </a>
	                            </li>
	                            <li class="tab">
	                                <a href="#connections">
	                                <i class="material-icons">link</i>
	                                <span>Connections</span>
	                                </a>
	                            </li>
	                            <li class="tab">
	                                <a href="#notifications">
	                                <i class="material-icons">notifications_none</i>
	                                <span> Notifications</span>
	                                </a>
	                            </li>
	                            <li class="indicator" style="left: 0px; right: 0px;"></li>
	                        </ul>
	                    </div>
	                </div>
	                <div class="col right-content-block">
	                	<div id="general" class="active">
							<div class="content">
				                <div id="button-trigger" class="card scrollspy border-radius-6 pb-1 mt-0">
									<div class="table-block  table-block-new">
										<table class="striped highlight" id="my_holiday" style="width:100%">
											<thead>
												<tr>
													<th class="center">{{trans('message.no')}}</th>
													<th class="center">{{trans('message.date')}}</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div id="change-password" style="display: none;">
							<div class="content">
				                <div id="button-trigger" class="card scrollspy border-radius-6 pb-1 mt-0">
									<div class="table-block  table-block-new">
										<table class="striped highlight" id="my_holiday" style="width:100%">
											<thead>
												<tr>
													<th class="center">{{trans('message.no')}}</th>
													<th class="center">{{trans('message.date')}}</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div id="info" style="display: none;">
							<div class="content">
				                <div id="button-trigger" class="card scrollspy border-radius-6 pb-1 mt-0">
									<div class="table-block  table-block-new">
										<table class="striped highlight" id="my_holiday" style="width:100%">
											<thead>
												<tr>
													<th class="center">{{trans('message.no')}}</th>
													<th class="center">{{trans('message.date')}}</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection

@push('js')

<script type="text/javascript">
$(function() {
my_holiday = $('#my_holiday').dataTable({
"bProcessing": false,
"searching": false,
"bServerSide": true,
"bStateSave": true,
"autoWidth": false,
"sAjaxSource": "{{URL::route('user.my_holiday')}}",
"sPaginationType": "numbers",
"aaSorting": [
[1, "asc"]
],
"oLanguage": {
"sLengthMenu": "Display _MENU_ records"
},
"aoColumns": [
{ "mData": "no",bSortable: false,sWidth: "5%"},
{ "mData": "date",bSortable: false,sWidth: "25%"},

],
fnPreDrawCallback: function() {
},
fnDrawCallback: function(oSettings) {
},
});
});





</script>
@endpush
