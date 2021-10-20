<div class="form-box_NN">
	<div class="row">
		<div class="col s12 ">
			<div class="container">
			 	<div class="section users-edit">
				 	<div class="card scrollspy border-radius-6 overflow-unset card-with-header mt-0">
						<form id="form-booking-schedule-filter" name="form-booking-schedule-filter">
							<input type="hidden" name="from_date" id="from_date" class="fromDate">
							<input type="hidden" name="to_date" id="to_date" class="toDate">
							<input type="hidden" name="date" id="date" class="todayDate">
							<input type="hidden" name="layout" id="layout" value="week" class="scheduleLayout">
						</form>
					<div class="row">
							<form class="col s12" id="form-schedule-add" name="form-schedule-add">
								<div class="form-group-main">
									<div class="row">

										<div class="input-field col s4 k-dropdown">
											<label>{{ trans('message.select_type') }}<span>*</span></label>
											<select name="user_id" id="booking_user_id" class="browser-default">
												<option value="" selected>{{trans('message.select')}}</option>
												@foreach($roles as $roleId => $role)
													<optgroup label="{{$role}}">
														@foreach($roleUsers[$role] as $key => $roleUser)
															<option value="{{$key}}">{{$roleUser}}</option>
														@endforeach
													</optgroup>
												@endforeach
											</select>
											<span class="k-error error" id="type_id_error"></span>
										</div>

										<div class="input-field col s4  k-input-text">
											<label>{{ trans('message.begin_date') }}<span>*</span></label>
											<input type="text" name="date" id="beginDate" class="validate k-txt-box futureDatePicker" value="{{date('d-m-Y')}}" />
											<span class="k-error error" id="date_error"></span>
										</div>
									</div>

								</div>
								<div class="form-group-main ruls-form rulesFormData hidden">
									<div class="ruls-header-block">
										<h3>{{ trans('message.rule') }}</h3>
										<div class="input-field w-auto-width">
											<div class="add-row-button">
												<a href="#" class="scheduleAddRow">+</a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<div class="rulesData addmore-schedule">

											</div>
										</div>
									</div>
									<!-- Main element container -->
									<div class="row">
										<div class="col s12">
											<div class="form-buttom-btn">
												<input type="submit" name="" value="Apply" class="block-btn-main-sc  btn k-button-fill k-btn-normal scheduleSave">
												<a href="#" class="block-btn-main-sc  btn k-button-fill k-btn-normal getPreivew">{{ trans('message.preview') }}</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="previewData hidden">

				</div>
			</div>
		</div>
	</div>
</div>

<script id="schedule-addmore" type="text/template">
	@include('schedule.list')
</script>
