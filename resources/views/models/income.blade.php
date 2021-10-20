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
                <h3  class="k-h3">{{trans('message.income')}}</h3>
              </div>
            </div>
            <div class="col s11 page-filter-coustome">
              <form name="frm_filter" id="frm_filter"  method="post">
                <input type="hidden"  class="date" id="date">
                <input type="hidden"  class="time" id="time">
                <input type="hidden"  class="from_date" id="from_date">
                <input type="hidden"  class="to_date" id="to_date">
                <input type="hidden"  class="amount" id="amount">
                <div class="row">
                  <div class="input-field col m10 s10">
                    <div class="row cus-margin  filter-block-new">
                      <div class="  add-btn col m2 cus-width-control s2 cus-padding m-0">
                        <a class="modal-trigger   btn k-button-fill k-btn-small"  href="#modal1">{{trans('message.add_filter')}} <span>+</span></a>
                        <div id="modal1" class="modal cutome-modal-pos">
                          <div class="modal-content">
                            <div class="search-field-box">
                              <div class="input-field col s12 p-0 m-0 k-input-text">
                                <input placeholder="Placeholder" id="filer_name" type="text" class="validate k-txt-box" >
                              </div>
                            </div>
                            <div class="filter-accodian">
                              <ul id="filters"  class="collapsible">
                                <li>
                                  <div class="collapsible-header">
                                    <span>{{trans('message.date')}}</span>
                                    <i class="material-icons">expand_more</i>
                                  </div>
                                  <div class="collapsible-body">
                                    <div class="drop-inner-content input-field  k-input-text">
                                      <input type="text" name="date" id="date" class=" k-txt-box futureDatePicker search_date">
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="collapsible-header">
                                    <span> {{trans('message.period')}}</span>
                                    <i class="material-icons">expand_more</i>
                                  </div>
                                  <div class="collapsible-body">
                                    <div class="drop-inner-content input-field  k-input-text">
                                      <input type="text" name="period" id="period" class="k-txt-box daterange search_period">
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="collapsible-header">
                                    <span>sum</span>
                                    <i class="material-icons">expand_more</i>
                                  </div>
                                  <div class="collapsible-body">
                                    <div class="drop-inner-content input-field  k-input-text">
                                      <input type="number" name="amount" id="search_amount" class="k-txt-box search_amount">
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="collapsible-header"> <span>{{trans('message.time')}}</span>
                                <i class="material-icons">expand_more</i></div>
                                <div class="collapsible-body">
                                  <div class="drop-inner-content input-field  k-input-text">
                                    <input type="text" id="search_time" name="time" class="k-txt-box search_time">
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="filter_date" class="filter-N-btn col m2 cus-width-control s2 cus-padding m-0" ></div>
                    <div id="filter_period" class="filter-N-btn col m2 cus-width-control s2 cus-padding m-0" ></div>
                    <div id="filter_amount" class="filter-N-btn col m2 cus-width-control s2 cus-padding m-0" ></div>
                    <div id="filter_time" class="filter-N-btn col m2 cus-width-control s2 cus-padding m-0" ></div>
                  </div>
                </div>
                <div class="input-field col m2 s2">
                  <div class="">
                    <a class="clearFilterData  btn k-button-fill k-btn-normal" data-type="income_all"> {{trans('message.clear_filters')}}<span>X</span></a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card-content">
          <div class="content">
            <div id="button-trigger" class="card scrollspy border-radius-6 pb-1">
              <div class="table-block table-block-new">
                <table class="striped highlight" id="income" style="width:100%">
                  <thead>
                    <tr>
                      <th>{{trans('message.date')}}</th>
                      <th>{{trans('message.studio')}}</th>
                      <th>{{trans('message.site')}}</th>
                      <th>{{trans('message.amount')}}</th>
                      <th>{{trans('message.time')}}</th>
                      <th>{{trans('message.last_check')}}</th>
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
income = $('#income').dataTable({
"bProcessing": false,
"searching": false,
"bServerSide": true,
"bStateSave": true,
"autoWidth": false,
"sAjaxSource": "{{URL::route('models.income')}}",
"fnServerParams": function ( aoData ) {
var time = $('#time').val();
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var amount = $('#amount').val();
var date = $('#date').val();
aoData.push(
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
{ "mData": "date",bSortable: true,sWidth: "10%"},
{ "mData": "studio_name",bSortable: true,sWidth: "20%"},
{ "mData": "site_name",bSortable: true,sWidth: "20%"},
{ "mData": "amount",bSortable: true,sWidth: "10%"},
{ "mData": "time",bSortable: true,sWidth: "10%"},
{ "mData": "last_check",bSortable: true,sWidth: "10%"},
],
fnPreDrawCallback: function() {
},
fnDrawCallback: function(oSettings) {
},
});
income.fnSetFilteringDelay(1000);
$("#income thead#filters input:text").donetyping(function() {
income.fnFilter(this.value, $("#income thead#filters input:text").index(this));
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
$(document).on("change", ".search_date", function(e) {
e.preventDefault();
$('#date').val($(this).val());
add_search_tab('filter_date',$(this).val(),'income_date');
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
$(document).on("keyup",'#search_amount', function() {
var value = $(this).val().toLowerCase();
$('#amount').val(value);
if(value !=''){
add_search_tab('filter_amount',value,'income_amount');
}
income.fnDraw();
});
$(document).on("keyup",'#search_time', function() {
var value = $(this).val().toLowerCase();
$('#time').val(value);
if(value !=''){
add_search_tab('filter_time',value,'income_time');
}
income.fnDraw();
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
add_search_tab('filter_period',start.format('YYYY-MM-DD') +' '+ end.format('YYYY-MM-DD'),'income_period');
income.fnDraw();
});
function add_search_tab(tab_name,value,datatype) {
var html = '<a class="'+tab_name+' main-filter-component-btn k-button-border k-btn-small" data-type="'+datatype+'">'+value+'</a> <button  type="button" data-type="'+datatype+'" class="close-filter-btn clearFilterData">X</button>';
$('#'+tab_name).html(html);
$('#'+tab_name).addClass( "cleardata" );
}
</script>
@endpush
