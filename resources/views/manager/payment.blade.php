@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12 pt-1 pb-1">
		<div class="container">
			<div class="">
				<div class="card-with-header filter-group-box">
					<div class="card-header">
						<div class="col s1 page-heading-coustome">
							<div class="heading-h2">
								<h3 class="k-h3">{{trans('message.payment')}}</h3>
							</div>
						</div>
					</div>
					<div class="card-content">
						<div class="content">
							<div id="button-trigger" class="card scrollspy border-radius-6 pb-1">
								<div class="table-block table-block-new">
									<div class="boking-filter-row">
										<div class="booking-filter-block " >
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
												<ul id='filter-option' class='dropdown-content  modal-filter-dropdown'>
													<li class="li-name">
														<a href="#" class="filterValue" data-type="name" data-area="user">{{ trans('message.name') }}</a>
													</li>
													<li class="li-date">
														<a href="#" class="filterValue" data-type="date" data-area="user">{{ trans('message.date') }}</a>
													</li>
													<li class="li-status">
														<a href="#" class="filterValue" data-type="status" data-area="user">{{ trans('message.status') }}</a>
													</li>
													<li class="li-period">
														<a href="#" class="filterValue" data-type="period" data-area="user">{{ trans('message.period') }}</a>
													</li>
													<li class="li-amount">
														<a href="#" class="filterValue" data-type="amount" data-area="user">{{ trans('message.amount') }}</a>
													</li>
													<li class="li-usertype">
														<a href="#" class="filterValue" data-type="usertype" data-area="user">{{ trans('message.user_type') }}</a>
													</li>
												</ul>
											</div>
											<!-- Dropdown Structure -->
											<!-- Dropdown Structure -->
											<ul id='nameDropdown' class=' dropdown-with-checkbox dropdown-content  modal-filter-dropdown'>
												@foreach($users['roles'] as $roleId => $role)
												<li>
													<h6>{{$role}}</h6>
													@foreach($users['rolesusers'][$role] as $key => $roleUser)
													<div class="list-block-checkbox">
														<label class="k-checkbox-fill">
															<input type="checkbox" data-id={{$key}} data-type="admin" value="{{$key}}" class="filled-in nameDropdown" name="userCheckbox" id="userCheckbox_{{$key}}" multiple="multiple" />
															<span>{{$roleUser}}</span>
														</label>
													</div>
													@endforeach
												</li>
												@endforeach
											</ul>
											<ul id='usertypeDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown date-inner-dropdown  dropdown-with-checkbox'>
												@foreach($roles as $rkey => $role_val)
												<li>
													<label class="k-checkbox-fill">
														<input type="checkbox" data-id={{$rkey}} data-type="admin" value="{{$rkey}}" class="filled-in usertypeDropdown" name="roomCheckbox" id="usertypeCheckbox_{{$rkey}}" multiple="multiple" />
														<span>{{$role_val}}</span>
													</label>
												</li>
												@endforeach
											</ul>
											<ul id='dateDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown date-inner-dropdown'>
												<div class="drop-inner-content k-input-text p-0">
													<input type="text" name="date"  class="form-control futureDatePicker search_date k-txt-box">
												</div>
											</ul>
											<ul id='statusDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown date-inner-dropdown  dropdown-with-checkbox'>
												@foreach($payment_status as $pkey => $pay_val)
												<li>
													<label class="k-checkbox-fill">
														<input type="checkbox" data-id={{$pkey}} data-type="admin" value="{{$pkey}}" class="filled-in statusDropdown" name="statusCheckbox" id="usertypeCheckbox_{{$pkey}}" multiple="multiple" />
														<span>{{$pay_val}}</span>
													</label>
												</li>
												@endforeach
											</ul>
											<!-- Dropdown Structure -->
											<ul id='periodDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown period-date-dropdown'>
												<div class="drop-inner-content k-input-text p-0">
													<input type="text" name="period" id="period" class="form-control daterange search_period k-txt-box">
												</div>
											</ul>
											<!-- Dropdown Structure -->
											<ul id='amountDropdown'  class='dropdown-content  modal-filter-dropdown'>
												<div class="drop-inner-content k-input-text p-0">
													<input type="number" id="search_amount" name="amount" class="form-control search_amount k-txt-box">
												</div>
											</ul>
										</div>
									</div>
									<form id="form-payment-filter" name="form-payment-filter">
										<input type="hidden"  class="user_name" id="user_name">
										<input type="hidden"  class="date" id="date">
										<input type="hidden"  class="period" id="period">
										<input type="hidden"  class="status" id="status">
										<input type="hidden"  class="from_date" id="from_date">
										<input type="hidden"  class="to_date" id="to_date">
										<input type="hidden"  class="amount" id="amount">
										<input type="hidden"  class="user_role" id="user_role">
									</form>
									<table class="striped highlight" id="payment" style="width:100%">
										<thead>
											<tr>
												<th>
													<label class="k-checkbox-fill">
														<input type="checkbox" class="filled-in main_checkbox" />
														<span style="padding-left: 40px;" ></span>
													</label>
												</th>
												<th>{{trans('message.name')}}</th>
												<th>{{trans('message.date')}}</th>
												<th>Sum</th>
												<th class="Observations-block">{{trans('message.description')}}</th>
												<th>{{trans('message.status')}}</th>
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
		</div>
	</div>
</div>
@endsection

@push('js')

<script type="text/javascript">
$(function() {
payment = $('#payment').dataTable({
"bProcessing": false,
"searching": false,
"bServerSide": true,
"bStateSave": true,
"autoWidth": false,
"sAjaxSource": "{{URL::route('manager.payment')}}",
"fnServerParams": function ( aoData ) {
var username = $('#user_name').val();
var studio_name = $('#studio_name').val();
var today = $('#today').val();
var unpaid = $('#unpaid').val();
var date = $('#date').val();
var status = $('#status').val();
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var amount = $('#amount').val();
var user_role = $('#user_role').val();
aoData.push( { "name": "username", "value": username  },
				{ "name": "date", "value": date },
				{ "name": "status", "value": status },
				{ "name": "from_date", "value": from_date },
				{ "name": "to_date", "value": to_date },
				{ "name": "amount", "value": amount },
				{ "name": "user_role", "value": user_role }
);
},
"sPaginationType": "numbers",
"aaSorting": [
[1, "asc"]
],
"oLanguage": {
"sLengthMenu": "Display _MENU_ records"
},
"aoColumns": [{
mData: "id",
bVisible: true,
bSortable: false,
sWidth: "5%",
sClass: 'text-center',
mRender: function(v, t, o) {
	return '<label class="k-checkbox-fill"><input type="checkbox" class="filled-in checkbox_all" name="id" data-id="'+o.id +'"  id="chk_' + v + '" /><span style="padding-left: 40px;"></span></label>'
},
},
{ "mData": "user_name",bSortable: true,sWidth: "10%"},
{ "mData": "date",bSortable: true,sWidth: "10%"},
{ "mData": "amount",bSortable: true,sWidth: "10%"},
{ "mData": "description",bSortable: true,sWidth: "35%"},
{
"mData": "status",
sWidth: "20%",
sClass: "text-center",
mRender: function(v, t, o) {
	if(v == "rejected") {
		return '<span class="new badge red-box">rejected</span>';
	} else if(v == "pending") {
		return '<span class="new badge red-box">pending</span>';
	}
}
},
],
fnPreDrawCallback: function() {
},
fnDrawCallback: function(oSettings) {
},
});
payment.fnSetFilteringDelay(1000);
$("#payment thead#filters input:text").donetyping(function() {
payment.fnFilter(this.value, $("#payment thead#filters input:text").index(this));
});
});
jQuery('#frm_filter').submit(function(e) {
myShow();
e.preventDefault();
var redrawtable = jQuery('#product').dataTable();
redrawtable.fnDraw();
jQuery("#chkname").html("Search");
});
jQuery('#btn_reset').click(function() {
myShow();
jQuery('#frm_filter')[0].reset();
var redrawtable = jQuery('#product').dataTable();
redrawtable.fnDraw();
});
$(document).on("click", ".user_value", function(e) {
e.preventDefault();
$('#user_name').val($(this).data('value'));
add_search_tab('filter_name',$(this).text(),'user_name');
payment.fnDraw();
});
$(document).on("click", ".role_value", function(e) {
e.preventDefault();
$('#user_role').val($(this).data('value'));
add_search_tab('filter_usertype',$(this).text(),'user_role');
payment.fnDraw();
});
$(document).on("click", ".status_value", function(e) {
e.preventDefault();
$('#status').val($(this).data('value'));
add_search_tab('filter_status',$(this).text(),'status');
payment.fnDraw();
});
$(document).on("change", ".payment_status", function(e) {
e.preventDefault();
var checkElement = jQuery('#payment tbody input[type=checkbox]:checked');
		var checkId = [];
		jQuery.each(checkElement, function(i, ele) {
		checkId.push(jQuery(ele).data('id'));
		});
var status = $(this).val();
var user_id = checkId;
if(user_id != ''){
		swal({
	title:  are_you_sure ,
	text: you_want_to_change_payment_status,
	icon: 'warning',
	dangerMode: true,
	buttons: {
	cancel: not,
	delete: yes
	}
	}).then(function(willDelete) {
	if (willDelete) {
		$.ajax({
				url: "{{URL::route('manager.payment.status')}}",
				method: "POST",
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
				status: status,
				user_id: user_id
				},
				beforeSend: function() {
				},
				complete: function() {
				},
				error: function(response) {
				if (response.status == 400) {
				$.each(response.responseJSON.errors, function(k, v) {
				$('#' + k + '_error').text(v);
				});
				};
				},
				success: function(response) {
					payment.fnDraw();
				},
				});
	}
	});
	}
});
$(document).on("change", ".search_date", function(e) {
e.preventDefault();
$('#date').val($(this).val());
add_search_tab('filter_date',$(this).val(),'date');
payment.fnDraw();
});
$(document).on("keyup",'#firstname_search', function() {
var value = $(this).val().toLowerCase();
$("#userul li").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
$(document).on("keyup",'#filer_name', function() {
var value = $(this).val().toLowerCase();
$("#filters > li").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
$(document).on("keyup",'#search_amount', function() {
var value = $(this).val().toLowerCase();
$('#amount').val(value);
if(value !=''){
add_search_tab('filter_amount',value,'amount');
}
payment.fnDraw();
});
$(document).on("click", ".clearFilterData", function(e) {
e.preventDefault();
var type = $(this).data('type');
});
$('.daterange').daterangepicker({
opens: 'center'
}, function(start, end, label) {
	$('#from_date').val(start.format('YYYY-MM-DD'));
	$('#to_date').val(end.format('YYYY-MM-DD'));
	add_search_tab('filter_period',start.format('YYYY-MM-DD') +' '+ end.format('YYYY-MM-DD'),'period');
	payment.fnDraw();
});
function add_search_tab(tab_name,value,datatype) {
	var html = '<a class="'+tab_name+' main-filter-component-btn k-button-border k-btn-small" data-type="'+datatype+'">'+value+'</a> <button  type="button" data-type="'+datatype+'" class="close-filter-btn clearFilterData">X</button>';
	$('#'+tab_name).html(html);
	$('#'+tab_name).addClass( "cleardata" );
}
</script>
@endpush
