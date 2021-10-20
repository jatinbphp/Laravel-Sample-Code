@extends('layouts.app')

@section('breadcrumb')
  <div class="col s2 m6 l6">
         <a data-tooltip="{{trans('message.lead')}}" id="general_lead" class=" btn k-button-fill k-icon k-icon-small right">
            <img src="{{ asset('img/plus-bl.png')}}">
        </a>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
                    <div class="section users-edit">
                        <div id="button-trigger" class="card scrollspy border-radius-6 pb-1">
                            <div class="table-block table-block-new">
                                <table class="striped highlight" id="all_leads" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th  class="center">{{trans('message.no')}}</th>
                                            <th  class="center">{{trans('message.avatar')}}</th>
                                            <th  class="center">{{trans('message.name')}}</th>
                                            <th  class="center">{{trans('message.description')}}</th>
                                            <th  class="center">{{trans('message.number_of_points')}}</th>
                                            <th  class="center">{{trans('message.user')}}</th>
                                            <th  class="center">{{trans('message.actions')}}</th>
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
    var admin = "{{ Auth::user()->hasPermission('is_admin')  }}";
    all_leads = $('#all_leads').dataTable({
        "bProcessing": false,
"searching": false,
        "bServerSide": true,
        "bStateSave": true,
        "autoWidth": false,
        "sAjaxSource": "{{URL::route('lead.all_leads')}}",
        "sPaginationType": "numbers",
        "aaSorting": [
            [1, "asc"]
        ],
        "oLanguage": {
            "sLengthMenu": "Display _MENU_ records"
        },
        "aoColumns": [{
            "mData": "no",
            bSortable: true,
            sWidth: "5%"
        }, {
            "mData": "avatar",
            bSortable: true,
            sWidth: "10%"
        }, {
            "mData": "name",
            bSortable: true,
            sWidth: "25%"
        }, {
            "mData": "descriere",
            bSortable: true,
            sWidth: "35%"
        }, {
            "mData": "valoare_puncte",
            bSortable: true,
            sWidth: "10%"
        }, {
            "mData": "username",
            bSortable: true,
            sWidth: "35%"
        }, {
            "mData": "add_by",
            sWidth: "10%",
            sClass: "text-center",
            bSortable: false,
            mRender: function(v, t, o) {
                if (admin) {
                    return '<a data-id="' + o.id + '" title="Edit lead request" class="edit_lead_request  edit-icon"><span><i class="material-icons">edit</i></span></a><a data-id="' + o.id + '" title="Delete lead request" class="delete_lead_request  delete-icon"><span><i class="material-icons">delete</i></span></a>';
                } else {
                    return '<a data-id="' + o.id + '" title="Edit lead request" class="edit_lead_request  edit-icon"><span><i class="material-icons">edit</i></span></a>';
                }
                if (admin) {
                    return '<a data-id="' + o.id + '" title="Delete lead request" class="delete_lead_request  delete-icon"><span><i class="material-icons">delete</i></span></a>';
                } else {
                    return '';
                }
            },
        }, ],
        fnPreDrawCallback: function() {},
        fnDrawCallback: function(oSettings) {},
    });
});

$(document).on("click", "#general_lead", function() {
    $.ajax({
        url: public_path + "lead/all",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            myShow();
        },
        complete: function() {
            myHide();
        },
        success: function(response) {
            if (response.success) {
                $(".lead-info").html(response.html);
                $("#show-general-lead-modal").toggleClass('hidden');
            }
        },
    });
});

$(document).on("click", ".close-lead_modal", function(e) {
    $(".overlay-layer").attr('hidden');
    $("#show-general-lead-modal").toggleClass('hidden');
    $("form#form-general-lead")[0].reset();
});

$(document).on("click", ".saveGenerallead", function(e) {
    e.preventDefault();
    var data = jQuery(this).parents('form:first').serialize();
    $.ajax({
        url: public_path + "lead/save",
        type: 'post',
        dataType: 'json',
        data: data,
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
                    $('#' + k + '_error').parent('div').addClass('k-input-error');
                });
            }
        },
        success: function(response) {
            if (response.success) {
                setTimeout(function() {
                    var redrawtable = jQuery('#all_leads').dataTable();
                    redrawtable.fnDraw();
                }, 3);
                $('.error').text("");
                $('.error').parent('div').removeClass('k-input-error');
                $("#show-general-lead-modal").find(".lead-info").html("");
                $("#show-general-lead-modal").toggleClass('hidden');
                M.toast({
                    html: response.message
                })
            }
        },
    });
});

$(document).on("click", ".edit_lead_request", function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: "get_edit_lead/",
        method: "post",
        data: {
            id: id
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
        success: function(response) {
            $('#edit_lead_request').html(response.html);
            $("#modal-edit_lead_request").toggleClass('hidden');
        },
    });
});

$(document).on("click", ".submit-edit_lead_request", function(e) {
    e.preventDefault();
    var data = jQuery(this).parents('form:first').serialize();
    var id = $('.submit-edit_lead_request').data('id');
    $.ajax({
        url: "edit_lead/",
        type: 'post',
        dataType: 'json',
        data: data,
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
                    $('#edit_' + k + '_error').text(v);
                    $('#edit_' + k + '_error').parent('div').addClass('k-input-error');
                });
            }
        },
        success: function(response) {
            if (response.success) {
                setTimeout(function() {
                    var redrawtable = jQuery('#all_leads').dataTable();
                    redrawtable.fnDraw();
                }, 3);
                $("#modal-edit_lead_request").toggleClass('hidden');
                $(".overlay-layer").attr('hidden');
                $("form#form-edit-lead_request")[0].reset();
                $("#close-modal_edit_lead_request").find(".edit_lead_request").html("");
                $('.error').text("");
                $('.error').parent('div').removeClass('k-input-error');
            }
        },
    });
});

$(document).on("click", "#close", function(e) {
    $("#modal-edit_lead_request").toggleClass('hidden');
    $(".overlay-layer").toggleClass('hidden');
});

$(document).on("click", ".close-modal_edit_lead_request", function(e) {
    $(".overlay-layer").attr('hidden');
    $("form#form-edit-lead_request")[0].reset();
    $("#modal-edit_lead_request").toggleClass('hidden');
});

$(document).on("click", ".delete_lead_request", function(e) {
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
                url: "delete_lead",
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
                        setTimeout(function() {
                            var redrawtable = jQuery('#all_leads').dataTable();
                            redrawtable.fnDraw();
                        }, 3);
                    }
                },
            });
        }
    });
});
</script>
@endpush
