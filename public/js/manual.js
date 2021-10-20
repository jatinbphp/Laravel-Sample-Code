$(document).on("click", ".manualChange", function(e) {
    var type = $(this).data('type');
    $(".manualTab").html("");
    changeManualTab(type);
});
changeManualTab('company');

function changeManualTab(type) {
    var url = publicPath + "knowledge/" + type;
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
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
                $("#" + type).find(".content").html(response.html);
                $('.dropdown-trigger').dropdown();
            }
        },
    });
}