$(function() {
    model_under_obeservation = $('#model_under_obeservation').dataTable({
        "bProcessing": false,
        "bServerSide": true,
        "bStateSave": true,
        "autoWidth": false,
        "searching": false,
        "sAjaxSource": publicPath + "model_under_obeservation",
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
        "aoColumns": [{
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
            "mData": "phone",
            bSortable: true,
            sWidth: "10%"
        }, {
            "mData": "user_type",
            bSortable: true,
            sWidth: "5%"
        }, {
            "mData": "problems",
            bSortable: false,
            sWidth: "45%"
        }, {
            "mData": "profile",
            bSortable: false,
            sWidth: "5%"
        }, ],
        fnPreDrawCallback: function() {},
        fnDrawCallback: function(oSettings) {
            $('.tooltipped').tooltip();
        },
    });
});
$(document).on("change", "select[name='model_under_obeservation_length']", function(e) {
    $(".model-block-row").html("");
    if ($(this).find('option:selected').html() == "Custom") {
        dataTableFilter("model_under_obeservation");
    }
});