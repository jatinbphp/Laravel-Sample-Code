@extends('layouts.app')
@section('content')
<div class="section groups-container" id="user-profile">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="row">
        <div class="col s12">

                        <div class="breadcrumbs-dark p-0 mt-0 mb-1 only-breadcrumbs" id="breadcrumbs-wrapper">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span> {{trans('message.staff') }}   {{trans('message.holiday')}} </span></h5>
                            <ol class="breadcrumbs mb-0 mt-2">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"> {{trans('message.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                  {{trans('message.staff') }}   {{trans('message.holiday')}}
                                </li>
                            </ol>
                        </div>


                <div class="card scrollspy border-radius-6 overflow-unset pt-0 mt-0">
                    <div class="row">
                        <div class="col s12">
                             <table class="responsive-table" id="admin_holiday" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="center">{{trans('message.no')}}</th>
                                                <th class="center">{{trans('message.avatar')}}</th>
                                                <th class="center">{{trans('message.user')}}</th>
                                                <th class="center">{{trans('message.date')}}</th>
                                                <th class="center">{{trans('message.actions')}}</th>
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
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />
@endpush
@push('js')
<script src="{{asset('app-assets/vendors/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('app-assets/vendors/datatables/dataTables.scrollingPagination.js')}}"></script>
<script src="{{asset('app-assets/vendors/datatables/fnStandingRedraw.js')}}"></script>
<script src="{{asset('app-assets/vendors/datatables/donetyping.js')}}"></script>
<script type="text/javascript" src="{{asset('js/daterangepicker.min.js')}}"></script>
<script type="text/javascript">
$(function() {
var admin = "{{ Auth::user()->hasPermission('is_admin')  }}";
admin_holiday = $('#admin_holiday').dataTable({
"bProcessing": false,
"searching": false,
"bServerSide": true,
"bStateSave": true,
"autoWidth": false,
"sAjaxSource": "{{URL::route('week.staff.holiday')}}",
"sPaginationType": "numbers",
"aaSorting": [
[1, "asc"]
],
"oLanguage": {
"sLengthMenu": "Display _MENU_ records"
},
"aoColumns": [
{ "mData": "no",bSortable: true,sWidth: "3%"},
{ "mData": "avatar",bSortable: true,sWidth: "5%"},
{ "mData": "username",bSortable: true,sWidth: "25%"},
{ "mData": "date",bSortable: true,sWidth: "7%"},
{
"mData": "add_by",
sWidth: "5%",
sClass: "text-center",
bSortable: false,
mRender: function(v, t, o) {
if(admin){
return '<a data-id="'+o.id +'" class="delete_holiday  btn k-button-fill k-icon k-icon-small"><span><i class="material-icons">delete</i></span></a>';
} else {
return '';
}
},
},
],
fnPreDrawCallback: function() {
},
fnDrawCallback: function(oSettings) {
},
});
});
$(document).on("click", ".delete_holiday", function(e) {
var id = $(this).data("id");
swal({
title: are_you_sure,
text: you_want_to_delete,
icon: 'warning',
dangerMode: true,
buttons: {
cancel: please_dont,
delete: yes_delete_it
}
}).then(function(willDelete) {
if (willDelete) {
$.ajax({
url: "delete_holiday" ,
method: "POST",
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')
},
data: {
id: id,
},
beforeSend: function() {
myShow();
},
complete: function() {
myHide();
},
success: function(response) {
if (response.success) {
M.toast({
html: response.message
})
swal(response.message, {
icon: "success",
});
setTimeout(function() {var redrawtable = jQuery('#admin_holiday').dataTable();
redrawtable.fnDraw();}, 3);
}
},
});
}
});
});
</script>
@endpush
