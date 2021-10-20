@extends('layouts.app')
@section('content')
<div class="section groups-container" id="user-profile">
    <div class="row">
        <div class="col s12">
                   <div class="section users-edit">
                        <div id="button-trigger" class="card scrollspy border-radius-6 pt-1">
                            <div class="table-block  table-block-new">
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
                                                <li class="li-time">
                                                    <a href="#" class="filterValue" data-type="time" data-area="user">{{ trans('message.time') }}</a>
                                                </li>
                                                <li class="li-period">
                                                    <a href="#" class="filterValue" data-type="period" data-area="user">{{ trans('message.period') }}</a>
                                                </li>
                                                <li class="li-amount">
                                                    <a href="#" class="filterValue" data-type="amount" data-area="user">{{ trans('message.amount') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Dropdown Structure -->
                                        <!-- Dropdown Structure -->
                                        <ul id='nameDropdown' style="width: 300px !important;" class=' dropdown-with-checkbox   dropdown-content  modal-filter-dropdown  dropdown-content select-dropdown multiple-select-dropdown'>
                                            <li>
                                                @foreach($users  as $key => $roleUser)
                                                <label class="k-checkbox-fill">
                                                    <input type="checkbox" data-id="{{$roleUser->id}}" data-type="admin" value="{{$roleUser->id}}" class="filled-in nameDropdown" name="userCheckbox" id="userCheckbox_{{$roleUser->id}}" multiple="multiple" />
                                                    <span>{{$roleUser->real_name}}</span>
                                                </label>
                                                @endforeach
                                            </li>
                                        </ul>
                                        <ul id='dateDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown date-inner-dropdown'>
                                            <div class="drop-inner-content k-input-text p-0">
                                                <input type="text" name="date"  class="form-control futureDatePicker search_date k-txt-box">
                                            </div>
                                        </ul>
                                        <ul id='timeDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown time-inner-dropdown'>
                                            <div class="drop-inner-content k-input-text p-0">
                                                <input type="text" name="time"  class="form-control search_time k-txt-box">
                                            </div>
                                        </ul>
                                        <ul id='studioDropdown' style="width: 300px !important;" class='dropdown-content  modal-filter-dropdown date-inner-dropdown'>
                                            <div class="drop-inner-content k-input-text p-0">
                                                <input type="text" name="date"  class="form-control search_studio k-txt-box">
                                            </div>
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
                                <form id="form-income-filter" name="form-income-filter">
                                    <input type="hidden"  class="name" id="name">
                                    <input type="hidden"  class="date" id="date">
                                    <input type="hidden"  class="time" id="time">
                                    <input type="hidden"  class="studio" id="studio">
                                    <input type="hidden"  class="period" id="period">
                                    <input type="hidden"  class="from_date" id="from_date">
                                    <input type="hidden"  class="to_date" id="to_date">
                                    <input type="hidden"  class="amount" id="amount">
                                </form>
                                <table id="income" style="width:100%" class="centered responsive-table  striped highlight">
                                    <thead>
                                        <tr>
                                            <th  class="center">{{trans('message.name')}}</th>
                                            <th  class="center">{{trans('message.date')}}</th>
                                            <th  class="center">{{trans('message.studio')}}</th>
                                            <th  class="center">{{trans('message.site')}}</th>
                                            <th  class="center">{{trans('message.amount')}}</th>
                                            <th  class="center">{{trans('message.time')}}</th>
                                            <th  class="center">{{trans('message.last_check')}}</th>
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
@endsection

@push('js')

<script type="text/javascript">
$(function() {
income = $('#income').dataTable({
"bProcessing": false,
"bServerSide": true,
"bStateSave": true,
"autoWidth": false,
"sAjaxSource": "{{URL::route('income.home')}}",
"fnServerParams": function ( aoData ) {
var name = $('#name').val();
var studio_name = $('#studio_name').val();
var time = $('#time').val();
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var amount = $('#amount').val();
var date = $('#date').val();
aoData.push( { "name": "name", "value": name  },
{ "name": "studio", "value": studio_name },
{ "name": "time", "value": time },
{ "name": "from_date", "value": from_date },
{ "name": "to_date", "value": to_date },
{ "name": "amount", "value": amount },
{ "name": "date", "value": date }
);
},
"sPaginationType": "numbers",
"aaSorting": [
[1, "asc"]
],
"oLanguage": {
"sLengthMenu": "Display _MENU_ records"
},
"aoColumns": [
{ "mData": "user_name",bSortable: true,sWidth: "15%"},
{ "mData": "date",bSortable: true,sWidth: "10%"},
{ "mData": "studio_name",bSortable: true,sWidth: "15%"},
{ "mData": "site_name",bSortable: true,sWidth: "15%"},
{ "mData": "amount",bSortable: true,sWidth: "10%"},
{ "mData": "time",bSortable: true,sWidth: "5%"},
{ "mData": "last_check",bSortable: true,sWidth: "10%"},
],
fnPreDrawCallback: function() {
},
fnDrawCallback: function(oSettings) {
},
});
// income.fnSetFilteringDelay(1000);
// $("#income thead#filters input:text").donetyping(function() {
//     income.fnFilter(this.value, $("#income thead#filters input:text").index(this));
// });
});
jQuery('#frm_filter').submit(function(e) {
e.preventDefault();
var redrawtable = jQuery('#income').dataTable();
redrawtable.fnDraw();
jQuery("#chkname").html("Search");
});
jQuery('#swal-button--delete').click(function() {
$('#user_name').val('');
income.fnDraw();
});
$(document).on("click", ".user_value", function(e) {
e.preventDefault();
$('#user_name').val($(this).data('value'));
income.fnDraw();
});
$(document).on("click", ".studio", function(e) {
e.preventDefault();
$('#studio_name').val($(this).data('value'));
income.fnDraw();
});
$(document).on("keyup",'#search_amount', function() {
var value = $(this).val().toLowerCase();
$('#amount').val(value);
income.fnDraw();
});
$(document).on("change", ".search_date", function(e) {
e.preventDefault();
$('#date').val($(this).val());
income.fnDraw();
});
$(document).on("keyup",'.search_time', function() {
var value = $(this).val().toLowerCase();
$('#time').val(value);
income.fnDraw();
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
$('.daterange').daterangepicker({
opens: 'center'
}, function(start, end, label) {
$('#from_date').val(start.format('YYYY-MM-DD'));
$('#to_date').val(end.format('YYYY-MM-DD'));
income.fnDraw();
});
$(document).on("click", ".filterValue", function(e) {
e.preventDefault();
var type = $(this).data("type");
$(this).parents('li').toggleClass('hidden');
var url =  "income/value";
$.ajax({
url: url,
type: 'post',
dataType: 'json',
data: {
type: type
},
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
beforeSend: function() {
myShow();
},
complete: function() {
myHide();
},
error: function(response) {
if (response.status == 400) {
$.each(response.responseJSON.errors, function(k, v) {
$('#' + k + '_error').text(v);
});
}
},
success: function(response) {
if (response.success) {
$(".filterData").append(response.html);
$('.dropdown-trigger').dropdown();
}
},
});
});
$(document).on("change", ".nameDropdown", function(e) {
e.preventDefault();
var valuesArray = $('.nameDropdown:checked').map(function() {
return $(this).val();
}).get().join();
jQuery("#name").val(valuesArray);
income.fnDraw();
});
$(document).on("change", ".statusDropdown", function(e) {
e.preventDefault();
var valuesArray = $('.statusDropdown:checked').map(function() {
return $(this).val();
}).get().join();
jQuery("#status").val(valuesArray);
income.fnDraw();
});
$(document).on("change", ".usertypeDropdown", function(e) {
e.preventDefault();
var valuesArray = $('.usertypeDropdown:checked').map(function() {
return $(this).val();
}).get().join();
jQuery("#user_role").val(valuesArray);
income.fnDraw();
});
$(document).on("click", ".closeIncomeFilter", function(e) {
e.preventDefault();
var mydata = $(this);
swal({
title: "Are you sure?",
text: "You want remove this filter",
icon: 'warning',
dangerMode: true,
buttons: {
cancel: not,
delete: yes
}
}).then(function(willDelete) {
if (willDelete) {
if (mydata.data("type") == "name") {
$('.nameDropdown:checkbox').prop('checked', false);
jQuery("#name").val("");
$('.li-name').toggleClass('hidden');
income.fnDraw();
}
if (mydata.data("type") == "date") {
jQuery(".search_date").val("");
jQuery("#date").val("");
$('.li-date').toggleClass('hidden');
income.fnDraw();
}
if (mydata.data("type") == "time") {
jQuery(".search_time").val("");
jQuery("#time").val("");
$('.li-time').toggleClass('hidden');
income.fnDraw();
}
if (mydata.data("type") == "status") {
jQuery(".status").val("");
jQuery("#status").val("");
$('.li-status').toggleClass('hidden');
income.fnDraw();
}
if (mydata.data("type") == "period") {
$('.modelDropdown:checkbox').prop('checked', false);
jQuery("#from_date").val("");
jQuery("#to_date").val("");
jQuery(".eriod").val("");
income.fnDraw();
$('.li-period').toggleClass('hidden');
}
if (mydata.data("type") == "amount") {
$('.trainerDropdown:checkbox').prop('checked', false);
jQuery(".amount").val("");
jQuery("#amount").val("");
income.fnDraw();
$('.li-amount').toggleClass('hidden');
}
if (mydata.data("type") == "usertype") {
$('.usertypeDropdown:checkbox').prop('checked', false);
jQuery("#user_role").val("");
$('.li-usertype').toggleClass('hidden');
income.fnDraw();
}
mydata.parents('.button-triggle-parent').remove();
}
});
});
</script>
@endpush
