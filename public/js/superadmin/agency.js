$(document).ready(function() {
    localStorage.setItem('localStudioId', "");
    localStorage.setItem('localStudioName', "");
    localStorage.setItem('localAgencyId', "");
    localStorage.setItem('localAgencyName', "");
    var agencyPath = publicPath + "agency/";
    var columns = [{
        mData: "id",
        bVisible: true,
        bSortable: false,
        sWidth: "3%",
        sClass: 'text-center',
        mRender: function(v, t, o) {
            return '<label  class="k-checkbox-fill" ><input type="checkbox" class="filled-in checkbox_all" name="id" data-id="' + v + '"  id="chk_' + v + '" /><span class=""></span></label>';
        },
    }, {
        "mData": "logo",
        bVisible: true,
        bSortable: false,
        sWidth: "5%",
    }, {
        "mData": "name",
        bSortable: true,
        sWidth: "15%"
    }, {
        "mData": "address",
        bSortable: true,
        sWidth: "15%"
    }, {
        "mData": "phone_no",
        sWidth: "15%",
        bSortable: true,
    }, {
        "mData": "status",
        sWidth: "15%",
        bSortable: true,
    }];
    $.ajax({
        url: agencyPath + "column",
        method: "post",
        async: false,
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
            position = 5;
            if (response.agency_admin) {
                columns.splice(position, 0, {
                    "mData": "admin_count",
                    sWidth: "15%",
                    bSortable: true,
                }, );
            }
            if (response.action) {
                columns.push({
                    "mData": "action",
                    sWidth: "8%",
                    bSortable: false,
                });
            }
        },
    });
    adminAgency = $('#adminAgency').dataTable({
        "bJQueryUI": true,
        "bProcessing": false,
        "bServerSide": true,
        "searching": false,
        "bStateSave": true,
        "autoWidth": true,
        "responsive": true,
        "bInfo": false,
        "sDom": 'til<"model-block-row">p',
        "sAjaxSource": agencyPath,
        "bDeferRender": true,
        "fnServerParams": function(aoData) {
            aoData.push({
                "name": "name",
                "value": jQuery("form#form-agency-filter").find('#agencyName').val()
            }, {
                "name": "email",
                "value": jQuery("form#form-agency-filter").find('#agencyEmail').val()
            }, {
                "name": "city",
                "value": jQuery("form#form-agency-filter").find('#agencyCity').val()
            }, {
                "name": "phone_no",
                "value": jQuery("form#form-agency-filter").find('#agencyPhone').val()
            }, {
                "name": "state",
                "value": jQuery("form#form-agency-filter").find('#agencyState').val()
            }, {
                "name": "country",
                "value": jQuery("form#form-agency-filter").find('#agencyCountry').val()
            }, {
                "name": "pin_code",
                "value": jQuery("form#form-agency-filter").find('#agencyPinCode').val()
            }, {
                "name": "is_active",
                "value": jQuery("form#form-agency-filter").find('#agencyStatus').val()
            });
        },
        "sPaginationType": "numbers",
        "aaSorting": [
            [1, "asc"]
        ],
        "aLengthMenu": [
            [10, 25, 50, 100, 11],
            [10, 25, 50, 100, "Custom"]
        ],
        "oLanguage": {
            "sLengthMenu": "Display _MENU_ records",
            'processing': 'Loading...'
        },
        "aoColumns": columns,
        fnPreDrawCallback: function() {
            $(function() {
                $("#adminAgency").addClass('table-loader');
            });
        },
        fnDrawCallback: function(oSettings) {
            $(function() {
                $('.dropdown-trigger').dropdown();
                $("#adminAgency").removeClass('table-loader');
            });
        },
    });
    $(document).on("click", ".close-admin-agency", function(e) {
        $(".overlay-layer").toggleClass('hidden');
        $("#modal-admin-agency").find(".modalx-content").html("");
        $("#modal-admin-agency").toggleClass('hidden');
    });
    $(document).on("keyup", ".nameFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyName').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".emailFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyEmail').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".phoneFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyPhone').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".cityFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyCity').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".stateFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyState').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".countryFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyCountry').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("keyup", ".pinCodeFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyPinCode').val($(this).val());
            adminAgency.fnDraw();
            rememberFilter();
        }
    });
    $(document).on("change", ".statusFilter", function(e) {
        e.preventDefault();
        if ($(this).parent().find('.closeAgencyFilter').length > 0) {
            jQuery("form#form-agency-filter").find('#agencyStatus').val($(this).val());
            adminAgency.fnDraw();
            $(".filterNewData.filterdate-block").mCustomScrollbar("update");
            rememberFilter();
        }
    });
    $(document).on("click", ".closeAgencyFilter", function(e) {
        e.preventDefault();
        var mydata = $(this);
        if (mydata.data("type") == "name_filter") {
            jQuery("form#form-agency-filter").find("#agencyName").val("");
            $('.li-name-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "email_filter") {
            jQuery("form#form-agency-filter").find("#agencyEmail").val("");
            $('.li-email-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "phone_filter") {
            jQuery("form#form-agency-filter").find("#agencyPhone").val("");
            $('.li-phone-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "city_filter") {
            jQuery("form#form-agency-filter").find("#agencyCity").val("");
            $('.li-city-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "state_filter") {
            jQuery("form#form-agency-filter").find("#agencyState").val("");
            $('.li-state-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "country_filter") {
            jQuery("form#form-agency-filter").find("#agencyCountry").val("");
            $('.li-country-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "pin_code_filter") {
            jQuery("form#form-agency-filter").find("#agencyPinCode").val("");
            $('.li-pin_code-filter').toggleClass('hidden');
        }
        if (mydata.data("type") == "status_filter") {
            jQuery("form#form-agency-filter").find("#agencyStatus").val("");
            $('.li-status-filter').toggleClass('hidden');
        }
        adminAgency.fnDraw();
        $(".filterDataSave").find("#my_filter_" + mydata.data("fields")).remove();
        $(".filterCloseSave").find("#my_filter_" + mydata.data("fields")).remove();
        rememberFilter();
        mydata.parents('.button-triggle-parent').remove();
        $(".filterNewData.filterdate-block").mCustomScrollbar("update");
        if ($(".filterNewData").find('a').length == 0) {
            $(".clearAllFilter,.saveFilter").addClass("hidden");
        }
    });
    $(document).on("click", ".addAgency", function(e) {
        e.preventDefault();
        $.ajax({
            url: agencyPath + "get",
            method: "post",
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
                $(".overlay-layer").toggleClass('hidden');
                $("#modal-admin-agency").find(".modalTitle").html($("#modal-admin-agency").find(".modalTitle").html().replace(update, add));
                $("#modal-admin-agency").find('.modalx-content').html(response.html);
                $("#modal-admin-agency").find(".loadSelect").formSelect();
                $('.dropify-event').dropify();
                $("#modal-admin-agency").toggleClass('hidden');
            },
        });
    });
    $(document).on("click", ".saveAgency", function(e) {
        e.preventDefault();
        $(".k-error").html("");
        $(".k-input-text").removeClass("k-input-error");
        var myData = $(this);
        myData.attr('disabled', true);
        var form = $('form#form-add-agency')[0];
        var data = new FormData(form);
        $.ajax({
            url: agencyPath + "save",
            type: 'post',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
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
                    myData.attr('disabled', false);
                    $.each(response.responseJSON.errors, function(k, v) {
                        $('#' + k + '_error').text(v);
                        $('#' + k + '_error').parent('div').addClass('k-input-error');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $('.error').text("");
                    $('.error').parent('div').removeClass('k-input-error');
                    M.toast({
                        html: response.message
                    });
                    $("form#form-add-agency")[0].reset();
                    $(".overlay-layer").toggleClass('hidden');
                    $("#modal-admin-agency").find('.modalx-content').html("");
                    $("#modal-admin-agency").toggleClass('hidden');
                    $('.k-input-text').removeClass('k-input-error');
                    $(".collapsibleBoday").html(response.html);
                    adminAgency.fnDraw();
                }
            },
        });
        return false;
    });
    $(document).on("click", ".editAgency", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: agencyPath + id + "/edit",
            method: "post",
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
                $(".overlay-layer").toggleClass('hidden');
                $("#modal-admin-agency").find(".close-admin-agency").addClass("askConfirm").attr("data-modal", "modal-admin-agency").attr("data-close", "close-admin-agency").removeClass("close-admin-agency");
                $("#modal-admin-agency").find(".modalTitle").html($("#modal-admin-agency").find(".modalTitle").html().replace(add, update));
                $("#modal-admin-agency").find('.modalx-content').html(response.html);
                $("#modal-admin-agency").find(".loadSelect").formSelect();
                $('.dropify-event').dropify();
                $("#modal-admin-agency").toggleClass('hidden');
            },
        });
    });
    $(document).on("click", ".updateAgency", function(e) {
        e.preventDefault();
        $(".k-error").html("");
        $(".k-input-text").removeClass("k-input-error");
        var myData = $(this);
        myData.attr('disabled', true);
        var id = $(this).data('id');
        var form = $('form#form-add-agency')[0];
        var data = new FormData(form);
        $.ajax({
            url: agencyPath + id + "/update",
            type: 'post',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
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
                    myData.attr('disabled', false);
                    $.each(response.responseJSON.errors, function(k, v) {
                        $('#' + k + '_error').text(v);
                        $('#' + k + '_error').parent('div').addClass('k-input-error');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    M.toast({
                        html: response.message
                    });
                    $(".overlay-layer").toggleClass('hidden');
                    $("#modal-admin-agency").find('.modalx-content').html("");
                    $("#modal-admin-agency").toggleClass('hidden').find(".askConfirm").addClass($("#modal-admin-agency").find(".askConfirm").data("close")).removeAttr("data-modal data-close").removeClass("askConfirm");
                    $(".collapsibleBoday").html(response.html);
                    adminAgency.fnDraw(false);
                }
            },
        });
    });
    $(document).on("click", ".deleteAgency", function(e) {
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
                    url: agencyPath + id + "/delete",
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
                            });
                            $('#removeAgency' + id).fadeOut(500, function() {
                                $(this).remove();
                            });
                            adminAgency.fnDraw(false);
                        }
                    },
                });
            }
        });
    });
    $(document).on("click", ".statusAgency", function(e) {
        var id = $(this).data("id");
        swal({
            title: are_you_sure,
            text: you_want_to_change_status,
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: please_dont,
                delete: yes
            }
        }).then(function(willDelete) {
            if (willDelete) {
                $.ajax({
                    url: agencyPath + id + "/status",
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
                            });
                            adminAgency.fnDraw(false);
                        }
                    },
                });
            }
        });
    });
    $(document).on("click", ".agencyDeleteSelect,.agencyStatusSelect", function(e) {
        e.preventDefault();
        var myData = $(this);
        var deleteElement = jQuery('#adminAgency tbody input[type=checkbox]:checked');
        var deleteId = [];
        jQuery.each(deleteElement, function(i, ele) {
            deleteId.push(jQuery(ele).data("id"));
        });
        if (0 == deleteId) {
            swal({
                title: "please select a record to proceed",
                type: "warning",
                timer: 3000,
                showConfirmButton: true,
                icon: 'warning',
                dangerMode: true,
            });
            return false;
        }
        swal({
            title: are_you_sure,
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: please_dont,
                delete: yes
            }
        }).then(function(willDelete) {
            if (willDelete) {
                var url = agencyPath + "deletes";
                if (myData.hasClass("agencyStatusSelect")) {
                    url = agencyPath + "status";
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')
                    },
                    data: {
                        ids: deleteId,
                    },
                    beforeSend: function() {
                        myShow();
                        $('.loader').removeClass("hidden");
                    },
                    complete: function() {
                        myHide();
                        $('.loader').addClass("hidden");
                    },
                    success: function(response) {
                        if (response.success) {
                            M.toast({
                                html: response.message
                            });
                            adminAgency.fnDraw(false);
                            jQuery('#adminAgency').find(".main_checkbox").prop("checked", false).parents(".card-panel").find(".multiple-buttons").addClass("hidden");
                        }
                    },
                });
            }
        });
    });
    $(document).on("click", ".agencyTab", function(e) {
        jQuery("form#form-agency-filter").find('#agencyName').val("");
        $(".resetAgencyFilter").val("");
        rememberFilter();
        adminAgency.fnDraw();
        jQuery("form#form-agency-filter").find('#agencyName').val("");
        localStorage.setItem('localStudioId', "");
        localStorage.setItem('localStudioName', "");
        localStorage.setItem('localAgencyId', "");
        localStorage.setItem('localAgencyName', "");
        $(".card-header").find(".singleBread").removeClass("hidden");
        $(".card-header").find(".multiBread").addClass("hidden");
        $(".card-header").find("#breadAgencyName").html("All Agency");
        $(".card-header").find("#breadStudioName").html("All Studios");
        $('.tabs-vertical .tabs .tab a sub').siblings('.agencySubName').css('top', '0px');
        $("#menu-2").find("sub").remove();
        $("#menu-2").find(".agencySubName").removeAttr("data-name");
        $(".agencyUser").removeClass("hidden");
        $(".studioUser").addClass("hidden");
        localStorage.setItem('adminActiveHref', "#agency-tab");
        localStorage.setItem('adminActiveTab', "#first");
    });
    $(document).on("click", "#breadAgencyName", function(e) {
        jQuery("form#form-agency-filter").find('#agencyName').val("");
        localStorage.setItem('localStudioId', "");
        localStorage.setItem('localStudioName', "");
        localStorage.setItem('localAgencyId', "");
        localStorage.setItem('localAgencyName', "");
        $(".card-header").find("#breadAgencyName").html("All Agency");
        $(".card-header").find("#breadStudioName").html("All Studios");
        $(".card-header").find(".singleBread").removeClass("hidden");
        $(".card-header").find(".multiBread").addClass("hidden");
        $("#menu-2").tabs("select", "agency-tab");
        $('.tabs-vertical .tabs .tab a sub').siblings('.agencySubName').css('top', '0px');
        $("#menu-2").find("sub").remove();
        $("#menu-2").find(".agencySubName").removeAttr("data-name");
        $(".agencyUser").removeClass("hidden");
        $(".studioUser").addClass("hidden");
    });
    $(document).on("change", "select[name='adminAgency_length']", function(e) {
        $(".dataTables_wrapper").find(".model-block-row").html("").removeClass("showData");
        if ($(this).find('option:selected').html() == "Custom") {
            dataTableFilter("adminAgency");
        }
    });
    $(document).on("click", ".showAgencyAdmin", function(e) {
        var agencyId = $(this).data("id");
        localStorage.setItem('admin-agency-id', agencyId);
        loadAgencyAdmin(agencyId);
        $("#modal-agency-admin-list").find(".plus-add-icon").attr("data-agencyId", agencyId);
        $(".overlay-layer").toggleClass('hidden');
        $("#modal-agency-admin-list").addClass("pleaseShow").toggleClass('hidden');
    });
    $(document).on("click", ".close-agency-admin-list", function() {
        localStorage.setItem('admin-agency-id', null);
        $(".overlay-layer").toggleClass('hidden');
        $("#modal-agency-admin-list").find(".plus-add-icon").removeAttr("data-agencyId");
        $("#modal-agency-admin-list").removeClass("pleaseShow").toggleClass('hidden');
    });
    $(document).on("change", "select[name='agencyAdminList_length']", function(e) {
        $(".dataTables_wrapper").find(".model-block-row").html("").removeClass("showData");
        if ($(this).find('option:selected').html() == "Custom") {
            dataTableFilter("agencyAdminList");
        }
    });
    $(document).on("change", ".agencyAdminColumn", function(e) {
        var checkedColumn = [];
        var uncheckedColumn = [];
        var checkedColumn = $(".agencyAdminColumn:checked").map(function() {
            return $(this).val();
        }).get();
        var uncheckedColumn = $(".agencyAdminColumn:not(:checked)").map(function() {
            return $(this).val();
        }).get();
        var table = $(this).data("table");
        dataTableView = $('#' + table).DataTable();
        dataTableView.columns(checkedColumn).visible(true);
        dataTableView.columns(uncheckedColumn).visible(false);
        $.ajax({
            url: publicPath + "filter/cookie",
            type: 'post',
            dataType: 'json',
            data: {
                columns: uncheckedColumn,
                table: table
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
            success: function(response) {},
        });
    });
});
/**
 * [loadAgencyAdmin description]
 * @param  {[type]} agencyId [description]
 * @return {[type]}          [description]
 */
function loadAgencyAdmin(agencyId) {
    var agencyAdminPath = publicPath + "agency_admin/";
    if ($.fn.DataTable.isDataTable('#agencyAdminList')) {
        $('#agencyAdminList').DataTable().destroy();
    }
    var columns = [{
        mData: "id",
        bVisible: true,
        bSortable: false,
        sWidth: "3%",
        sClass: 'text-center',
        mRender: function(v, t, o) {
            return '<label  class="k-checkbox-fill" ><input type="checkbox" class="filled-in checkbox_all" name="id" data-id="' + v + '"  id="chk_' + v + '" /><span class=""></span></label>'
        },
    }, {
        "mData": "avatar",
        bSortable: false,
        sWidth: "5%"
    }, {
        "mData": "name",
        bSortable: true,
        sWidth: "10%"
    }, {
        "mData": "email",
        bSortable: true,
        sWidth: "10%"
    }, {
        "mData": "agency_name",
        bSortable: true,
        sWidth: "10%"
    }, {
        "mData": "real_name",
        bSortable: true,
        sWidth: "10%"
    }, {
        "mData": "phone_no",
        bSortable: true,
        sWidth: "10%"
    }, {
        "mData": "status",
        bSortable: true,
        sWidth: "10%"
    }];
    $.ajax({
        url: agencyAdminPath + "column",
        method: "post",
        async: false,
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
            if (response.action) {
                columns.push({
                    "mData": "action",
                    sWidth: "8%",
                    bSortable: false,
                });
            }
        },
    });
    agencyAdminList = $('#agencyAdminList').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "searching": false,
        "bStateSave": true,
        "autoWidth": true,
        "responsive": true,
        "bInfo": false,
        "sDom": 'til<"model-block-row">p',
        "sAjaxSource": agencyAdminPath + agencyId,
        "fnServerParams": function(aoData) {
            aoData.push({
                "name": "name",
                "value": jQuery("form#form-agency-admin-filter").find('#agencyAdminName').val()
            }, {
                "name": "email",
                "value": jQuery("form#form-agency-admin-filter").find('#agencyAdminEmail').val()
            }, {
                "name": "phone",
                "value": jQuery("form#form-agency-admin-filter").find('#agencyAdminPhone').val()
            }, {
                "name": "agency_id",
                "value": jQuery("form#form-agency-admin-filter").find('#agencyName').val()
            }, {
                "name": "is_active",
                "value": jQuery("form#form-agency-admin-filter").find('#agencyAdminStatus').val()
            }, {
                "name": "impersonate",
                "value": jQuery("form#form-agency-admin-filter").find('#impersonate').val()
            });
        },
        "sPaginationType": "numbers",
        "aaSorting": [
            [1, "asc"]
        ],
        "aLengthMenu": [
            [10, 25, 50, 100, 11],
            [10, 25, 50, 100, "Custom"]
        ],
        "oLanguage": {
            "sLengthMenu": "Display _MENU_ records"
        },
        "aoColumns": columns,
        fnPreDrawCallback: function() {
            $(function() {
                $("#agencyAdminList").addClass('table-loader');
            });
        },
        fnDrawCallback: function(oSettings) {
            $(function() {
                $('.dropdown-trigger').dropdown();
                $("#agencyAdminList").removeClass('table-loader');
            });
        },
    });
    uncheckedColumn = [3];
    agencyAdminList.fnSetColumnVis(uncheckedColumn, false);
    saveColumnResult(uncheckedColumn, "agencyAdminList");
}