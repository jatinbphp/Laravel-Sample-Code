@if(isset($activityReport))
	<form id="form-update-activity-report" name="form-update-activity-report" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data" data-id="{{$activityReport->id}}">
@else
	<form id="form-add-activity-report" name="form-add-activity-report" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
@endif
	<div class="row">
     @if ($userRoleName == "Super Admin")
      <div class="input-field col s3">
        <select id="agency_id" name="agency_id" class="superAdminAgency loadSelect">
            <option value="">{{trans('message.select_agency')}}</option>
            @foreach(getAgency() as $agencyId => $agency)
              <option value="{{$agencyId}}" @if(isset($activityReport) && $agencyId == $activityReport->agency_id) selected='selected' @endif>{{$agency}}</option>
            @endforeach
        </select>
        <span class="error k-error" id="agency_id_error">
        </span>
      </div>
     @endif

  	@if ($userRoleName == "Super Admin" || $userRoleName == "Agency Admin")
      <div class="input-field col s3">
        <select id="studio_id" name="studio_id" class="superAdminStudio activityReportStudio loadSelect">
            <option value="">{{trans('message.select_studio')}}</option>
            @if(isset($activityReport))
              @foreach(getStudioByAgencyId($activityReport->agency_id) as $studioId => $studio)
                <option value="{{$studioId}}" data-badge="" @if(isset($activityReport) && $studioId == $activityReport->studio_id) selected='selected' @endif>{{$studio}}</option>
              @endforeach
            @elseif($userRoleName == "Agency Admin")
              @foreach(getStudioByAgencyId($user->agency_id) as $studioId => $studio)
                <option value="{{$studioId}}" data-badge="" @if(isset($activityReport) && $studioId == $activityReport->studio_id) selected='selected' @endif>{{$studio}}</option>
              @endforeach
            @endif
        </select>
        <span class="error k-error" id="studio_id_error">
        </span>
      </div>
	    <div class="input-field col s3">
	      <select id="role_id" name="role_id" class="activityRole loadSelect">
	          <option value="">{{trans('message.select_role')}}</option>
	          @foreach(getStudioRole() as $roleId => $role)
	            <option value="{{$roleId}}" @if(isset($activityReport) && $roleId == $activityReport->role_id) selected='selected' @endif>{{$role}}</option>
	          @endforeach
	      </select>
	      <span class="error k-error" id="role_id_error">
	      </span>
	    </div>

	    <div class="input-field col s3">
	      <select id="admin_id" name="admin_id" class="studioAdmin loadSelect signatureStudioAdmin">
	          <option value="">{{trans('message.select')}}</option>
	          @if(isset($activityReport))
		          @foreach(getAllUserByStudioRole($activityReport->role_id,$activityReport->studio_id) as $userId => $user)
		            <option value="{{$userId}}" @if(isset($activityReport) && $userId == $activityReport->admin_id) selected='selected' @endif>{{$user}}</option>
		          @endforeach
		      @endif
	      </select>
	      <span class="error k-error" id="admin_id_error">
	      </span>
	      <span class="error k-error" id="signature_missing_error">
	      </span>
	    </div>
    @endif
  </div>

  <div class="row">
    <div class="input-field col s3">
    	<h6 class="invoice-number mr-4 mb-5">{{trans('message.document')}} {{trans('message.no')}}</h6>
      <input id="name" name="invoice_no" type="text" class="validate activityInvoiceNo" @if(isset($activityReport)) value="{{sprintf('%04s',$activityReport->invoice_no)}}" @else value="{{getInvoiceNo()}}" @endif placeholder="Invoice No">
			<span class="error k-error" id="invoice_no_error"></span>
    </div>

    <div class="input-field col s3">
    		<h6 class="invoice-number mr-4 mb-5">{{trans('message.issue')}} {{trans('message.date')}}</h6>
    		<input id="billing_date" name="billing_date" type="text" class="validate pastFutureDatePicker" @if(isset($activityReport)) value="{{$activityReport->billing_date}}" @else value="{{date('d-m-Y')}}" @endif placeholder="{{trans('message.issue')}} {{trans('message.date')}}">
    		<span class="error k-error" id="billing_date_error"></span>
    </div>

    <div class="input-field col s3">
    		<h6 class="invoice-number mr-4 mb-5">{{trans('message.due')}} {{trans('message.date')}}</h6>
    		<input id="billing_due_date" name="billing_due_date" type="text" class="validate pastFutureDatePicker"  @if(isset($activityReport)) value="{{$activityReport->billing_due_date}}" @endif placeholder="{{trans('message.due')}} {{trans('message.date')}}">
    		<span class="error k-error" id="billing_due_date_error"></span>
    </div>

    <div class="input-field col s3">
    		<h6 class="invoice-number mr-4 mb-5">{{trans('message.currency')}}</h6>
    		<select id="currency" name="currency" class="loadSelect">
			<option value="">{{trans('message.select')}}</option>
			@foreach(getCurrency() as $currencyId => $currency)
			<option value="{{$currencyId}}" @if(isset($activityReport) && $activityReport->currency == $currencyId) selected=seleted @endif>{{$currency}}</option>
			@endforeach
		</select>
		<span class="error k-error" id="currency_error"></span>
    </div>
  </div>

	<div class="row mb-3">
		<div class="col m6 s12 invoice-logo display-flex pt-1 push-m6">

		</div>
		<div class="col m6 s12 pull-m6">
			<h4 class="indigo-text">{{trans('message.activity')}} {{trans('message.report')}}</h4>
		</div>
	</div>

	<div class="row">

      <div class="input-field col s2">
      		<h6 class="invoice-number mr-4 mb-5">{{trans('message.start')}} {{trans('message.date')}}</h6>
      		<input id="name" name="start_date" type="text" class="validate pastFutureDatePicker k-txt-box"@if(isset($activityReport)) value="{{$activityReport->start_date}}" @endif>
			<span class="error k-error" id="start_date_error"></span>
      </div>

      <div class="input-field col s2">
      		<h6 class="invoice-number mr-4 mb-5">{{trans('message.end')}} {{trans('message.date')}}</h6>
      		<input id="name" name="end_date" type="text" class="validate pastFutureDatePicker k-txt-box"@if(isset($activityReport)) value="{{$activityReport->end_date}}" @endif >
			<span class="error k-error" id="end_date_error"></span>
      </div>

    </div>

	<div class="invoice-product-details mb-3 invoice-item-repeater">
		<div data-repeater-list="activityList">
			<div class="mb-2" data-repeater-item>
				<div class="row mb-1">
					<div class="col s3 m4">
						<h6 class="m-0">{{trans('message.activity')}} {{trans('message.name')}}</h6>
					</div>
					<div class="col s3">
						<h6 class="m-0">{{trans('message.price')}} {{trans('message.per')}} {{trans('message.hour')}}/{{trans('message.day')}}</h6>
					</div>
					<div class="col s3">
						<h6 class="m-0">{{trans('message.working')}} {{trans('message.hours')}}</h6>
					</div>
					<div class="col s3 m2">
						<h6 class="m-0">{{trans('message.total')}}</h6>
					</div>
				</div>
				<div class="invoice-item display-flex mb-1">
					<div class="invoice-item-filed row pt-1">
						<div class="col s12 m4 input-field">
							<input id="activity" name="activity_name" type="text" class="validate readOnlyActivity value="{{old('activity_name')}}" required>
						</div>
						<div class="col m3 s12 input-field">
							<input id="price_per_hour" name="price_per_hour" type="text" class="validate numeric pricePerHour readOnlyActivity" maxlength="5" value="{{old('price_per_hour')}}" required>
						</div>
						<div class="col m3 s12 input-field">
							<input id="working_hours" name="working_hours" type="text" class="validate numeric workingHours" maxlength="5" value="{{old('working_hours')}}" required>
						</div>
						<div class="col m2 s12 input-field">
							<input id="total_amount" name="total_amount" type="text" class="validate rowTotalAmount" value="{{old('total_amount')}}" required>
						</div>
					</div>
					<div class="invoice-icon display-flex flex-column justify-content-between">
						<span data-repeater-delete class="delete-row-btn">
							<i class="material-icons">clear</i>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="input-field">
			<button class="btn invoice-repeat-btn" data-repeater-create type="button">
				<i class="material-icons left">add</i>
				<span>Add Item</span>
			</button>
		</div>
	</div>

	<!-- invoice subtotal -->
	<div class="invoice-subtotal">
		<div class="row">
			<div class="col m5 s12">
			</div>
			<div class="col xl4 m7 s12 offset-xl3">
				<ul>
					<li class="display-flex justify-content-between">
						<span class="invoice-subtotal-title">{{trans('message.sub')}}{{trans('message.total')}}</span>
						<input id="sub_total" name="sub_total" type="text" class="validate numeric subTotal" readonly="readonly" @if(isset($activityReport)) value="{{$activityReport->sub_total}}" @endif>
					</li>
					<li class="display-flex justify-content-between discountCSS">
						<span class="invoice-subtotal-title">{{trans('message.discount')}} </span>

						<input id="discount_percentage" name="discount_percentage" type="text" class="validate numeric discountPerTotal"  @if(isset($activityReport)) value="{{$activityReport->discount_percentage}}" @endif placeholder="Percentage" maxlength="3">

						<input id="discount" name="discount" type="text" class="validate numeric discountTotal" @if(isset($activityReport)) value="{{$activityReport->discount}}" @endif placeholder="Fixed">
					</li>
					<li class="display-flex justify-content-between">
						<span class="invoice-subtotal-title">{{trans('message.total')}}</span>
						<input id="total" name="total" type="text" class="validate numeric totalAmount" readonly="readonly" @if(isset($activityReport)) value="{{$activityReport->total}}" @endif>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($activityReport))
          <button class="ml-4  btn k-button-fill k-btn   action-btn updateActivityReport" name="action" type="submit" data-id="{{$activityReport->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{ trans('message.update')}} {{ trans('message.activity')}} {{ trans('message.report')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon saveActivityReport" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.activity')}} {{trans('message.report')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
